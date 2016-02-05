<div class="views">
<div id="msg" style="color:red;"><?php echo $msg; ?></div>
<form action="<?php echo $this->createUrl('user/reset');?>" name="RegisterForm" id="RegisterForm" method="post">
<div class="l_line">*手机号 <input type="text" name="username"  class="input_a"/>&nbsp;<a href="javascript::void(0)" id="sendsms">发送验证码</a></div>
<div class="l_line">*验证码 <input type="text" name="code" class="input_a"/><span></span></div>
<div class="l_line">*新密码 <input type="password" name="password" class="input_a" /><span></span></div>
    
    <p><a href="javascript::void(0)" id="register"><button type="button" class="btn btn-success btn-block">重置密码</button></a></p> 
</div>
<div>&nbsp;&nbsp;<a href="<?php echo $this->createUrl('user/login');?>">想起密码了,点击登录>></a></div>
</form>

<script>
$("#sendsms").click(function(){
	if($('input[name=username]').val().length !=11){
  		$('#msg').html('请输入正确的手机号码');
   		$('input[name=username]').focus();
   		return false;
  	}
	else{
	
		mobile = $('input[name=username]').val();
		$.ajax({
			type:"POST",   
     		url:"<?php echo $this->createUrl('user/checkuser');?>",
     		data:{
      			mobile:mobile,
      		}, 
			success:function(data){
				if(data==1){
						$.ajax({   
						type:"POST",   
						url:"<?php echo $this->createUrl('user/sendsms');?>",
						data:{
							mobile:mobile,
						},                  
						success:function(data){
							if(data==0){
								$('#sendsms').removeAttr('href');//去掉a标签中的href属性 
								$('#sendsms').removeAttr('onclick');//去掉a标签中的onclick事件
								$('#sendsms').addClass('disableCss');
								$('#msg').html('短信发送成功，请注意查看手机短信。如果未收到短信，请在30秒后重试！');
							}
							else{
								$('#msg').html('短信发送失败，请和网站客服联系！');
							}
						},
						});
				}
				else{
					$('#msg').html('您输入的账号不存在!');
				}
			}
		});
	
	}
});

$("#register").click(function(){
	if($('input[name=username]').val().length !=11){
  		$('#msg').html('请输入正确的手机号码');
   		$('input[name=username]').focus();
   		return false;
  	}
	if($('input[name=code]').val().length !=4){
  		$('#msg').html('请输入正确的验证码');
   		$('input[name=code]').focus();
   		return false;
  	}
	if($('input[name=password]').val().length <6){
  		$('#msg').html('密码不能为空切不能小于6位');
   		$('input[name=password]').focus();
   		return false;
  	}
	else{
		$('#RegisterForm').submit();
		
	}
});

</script>


