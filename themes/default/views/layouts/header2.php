<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title><?php echo CHtml::encode($this->_seoTitle); ?></title>
	<base href="<?php echo $this->_request->hostinfo.Yii::app()->homeUrl;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />
	<meta property="qc:admins" content="3621316677611163536375" />
	<meta property="wb:webmaster" content="cca24d5480c4043c" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath;?>/css/global.css"/>	
	<!-- 手持设备样式 -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<body>
<div class="web640">
	<!-- 头部header开始 -->
    <!--<div id="header_login">
    <?php if(Yii::app()->session['is_login']==1):?>
    	欢迎您,<?php echo  Yii::app()->session['username']; ?> ,<a href="<?php echo $this->createUrl('user/quit'); ?>">退出</a> &nbsp;
    <?php else: ?>
    <a href="<?php echo $this->createUrl('user/join'); ?>">注册</a> &nbsp;| &nbsp;<a href="<?php echo $this->createUrl('user/login'); ?>">登录</a>&nbsp;&nbsp;
    <?php endif; ?>
    </div>-->
	<div id="header">
		<div id="top_logo"><a href="<?php echo $this->createUrl('site/index');?>"><img src="<?php echo $this->_stylePath;?>/images/logo.png" height="70px;"/></a></div>
        <div id="top_search">
        	<form method="post" action="<?php echo $this->createUrl('site/search');?>"> 
        	<div id="search_txt"><input type="text" name="keyword" value="<?php if(isset(Yii::app()->session['keyword'])): echo Yii::app()->session['keyword']; endif; ?>" style="height:23px;width:98%;"/></div>
            <div id="search_btn"><input type="image" src="<?php echo $this->_stylePath;?>/images/search.png" height="20px;"/></div>
            </form>
        </div>
        <div id="login_reg">
        	 <?php if(Yii::app()->session['is_login']==1):?>
    	欢迎您,<?php echo  Yii::app()->session['username']; ?> ,<a href="<?php echo $this->createUrl('user/quit'); ?>">退出</a> &nbsp;
    <?php else: ?>
    <a href="<?php echo $this->createUrl('user/join'); ?>">注册</a> &nbsp;| &nbsp;<a href="<?php echo $this->createUrl('user/login'); ?>">登录</a>&nbsp;&nbsp;
    <?php endif; ?>
        </div>
	</div>
	<!-- 头部header结束 -->

<script type="text/javascript">  
                   
                function hideAddressBar_ios(){  
                        if(document.documentElement.scrollHeight <= document.documentElement.clientHeight) {  
                                bodyTag = document.getElementsByTagName('body')[0];  
                                bodyTag.style.height = document.documentElement.clientWidth / screen.width * screen.height + 'px';  
                        }  
                        setTimeout(function(){  
                                window.scrollTo(0, 1);    
                        }, 100);  
                };  
                function hideAddressBar_android(){  
                        var n = navigator.userAgent;  
                        if(n.match(/UCBrowser/i)){  
                                //uc浏览器  
                                hideAddressBar_ios();  
                                return false;  
                        }  
                        var self = document.getElementsByTagName('body')[0];  
                        if (self.requestFullscreen) {  
                                self.requestFullscreen();  
                        } else if (self.mozRequestFullScreen) {  
                                self.mozRequestFullScreen();  
                        } else if (self.webkitRequestFullScreen) {  
                                self.webkitRequestFullScreen();  
                        }  
                };  
                window.addEventListener("load",function(){  
                        navigator.userAgent.match(/Android/i) ? hideAddressBar_android() : hideAddressBar_ios();  
                });  
</script>  