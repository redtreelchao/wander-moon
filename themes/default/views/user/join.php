<div class="views">
<div id="msg" style="color:red;"><?php echo $msg; ?><?php echo $testcode ?></div>
<form action="<?php echo $this->createUrl('user/join');?>" name="RegisterForm" id="RegisterForm" method="post">
<div class="l_line">
<table><tr>
<td width="60px">*手机号</td> 
<td><input type="text" name="username"  class="input_a" style="width:130px;" />&nbsp;<a href="javascript::void(0)" id="sendsms">发送验证码</a></td>
</tr></table>
</div>
<div class="l_line">
<table><tr>
<td width="60px">*验证码</td>
<td><input type="text" name="code" class="input_a" style="width:130px;"/></td>
</tr></table>
</div>

<div class="l_line">
<table><tr>
<td width="60px">*密&nbsp;&nbsp;&nbsp;码</td>
<td ><input type="password" name="password" class="input_a" style="width:130px;"/></td>
</tr></table>
</div>
    <input type="hidden" name="ret_url"  value="<?php echo $ret_url; ?>"/>
    <p><a href="javascript::void(0)" id="register"><button type="button" class="btn btn-success btn-block">注册账号</button></a></p>  

<div>&nbsp;&nbsp;<a href="<?php echo $this->createUrl('user/login');?>">已有账号,点击登录>></a></div>
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
		/*mobile = $('input[name=username]').val();
		code = $('input[name=code]').val();
		password = $('input[name=password]').val();
		$.ajax({   
    		type:"POST",   
     		url:"<?php echo $this->createUrl('user/reg');?>",
     		data:{
      			mobile:mobile,code:code,password:password,
      		},                  
     		success:function(data){
				alert(data);
      			if(data==0){
					$('#msg').html('短信发送成功，请注意查看手机短信。如果未收到短信，请在30秒后重试！');
				}
				if(data==2){
					alert('验证码错误！');
				}
				else{
					alert('注册失败，请和网站客服联系！');
				}
			},
		});*/
	
	}
});

</script>


