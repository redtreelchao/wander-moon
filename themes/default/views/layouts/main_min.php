<?php 
    //引用公共头部模板    
	$this->renderPartial('/layouts/header_min');
?>
<!-- 内容main开始 -->
<div id="main" class="clear">
	<?php echo $content;?>
</div>
<!-- 内容main结束 -->

<?php 
	//引用公共底部模板	 
	//$this->renderPartial('/layouts/footer');
?>
