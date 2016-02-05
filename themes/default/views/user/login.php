<div class="views">
<div id="msg" style="color:red;"><?php echo $msg; ?><?php echo $testcode ?></div>
<form action="<?php echo $this->createUrl('user/login');?>" name="RegisterForm" id="RegisterForm" method="post">
<div class="l_line">
<table><tr>
<td width="60px">*手机号</td>
<td><input type="text" name="username"  class="input_a" value="<?php echo $_COOKIE['username']?>" style="width:130px;"/></td>
</tr></table>
</div>
<div class="l_line">
<table><tr>
<td width="60px">*密&nbsp;&nbsp;&nbsp;码</td>
<td><input type="password" name="password" class="input_a" value="<?php echo $_COOKIE['password']?>" style="width:130px;"/></td>
</tr></table>
</div>

    <p><a href="javascript::void(0)" id="register"><button type="button" class="btn btn-success btn-block">登录</button></a></p>
    <p><a href="<?php echo $this->createUrl('user/reset');?>" id=""><button type="button" class="btn btn-info btn-block">密码重置</button></a></p>
    <p><a href="<?php echo $this->createUrl('user/join');?>" id=""><button type="button" class="btn btn-info btn-block">注册账号</button></a></p>   
</div>

<input type="hidden" name="ret_url"  value="<?php echo $ret_url; ?>"/>
</form>

<script>
$("#register").click(function(){
	if($('input[name=username]').val().length !=11){
  		$('#msg').html('请输入正确的手机号码');
   		$('input[name=username]').focus();
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


