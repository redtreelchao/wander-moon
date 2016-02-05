<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_yii->language;?>" lang="<?php echo $this->_yii->language;?>">
<head>	
	<title>我的鹿</title>
	<base href="<?php echo $this->_request->hostinfo.Yii::app()->homeUrl;?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->_yii->language;?>" />
	<meta name="keywords" content="<?php echo $this->_seoKeywords;?>" />
	<meta name="description" content="<?php echo $this->_seoDescription;?>" />

	<link rel="stylesheet" type="text/css" href="<?php echo $this->_stylePath;?>/css/global.css"/>	
	<!-- 手持设备样式 -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

</head>
<body>
<div class="web640">
	<!-- 头部header开始 -->
	<a href="<?php echo $this->createUrl('site/index'); ?>">
    <div  class="header_min" style="height:50px;">
		
		<?php echo CHtml::encode($this->_seoTitle); ?> 
        <!--<span><a href="<?php echo $this->createUrl('site/index'); ?>"><img src="<?php echo $this->_stylePath;?>/images/home.png" height="22px;"/></a></span>-->
	</div>
    </a>
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