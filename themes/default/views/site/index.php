<?php $this->renderPartial('/layouts/nav1'); ?>
<div class="main_title clear">本周精选</div>
<?php foreach($goods as $item): ?>
<div class="post_list">
	<div class="image" ><a href="<?php echo $this->createUrl('goods/buy',array('id'=>$item['id']));?>"><img src="<?php echo $item['default_image']; ?>" width="100%;"/></a></div>
    <div class="core">
    	<div class="left"><a href="<?php echo $this->createUrl('goods/buy',array('id'=>$item['id']));?>"><?php echo $item['goods_name']; ?></a>
           <p><img src="<?php echo $this->_stylePath;?>/images/shalou.png" height="12px;"/>&nbsp;<span><?php echo $item['sales_endtime']; ?>结束</span></p>
        </div>
        <div class="right">
        	<span class="price"><?php echo GoodsPlan::getMinPirce($item['id']); ?></span>元
        </div>
    </div>
    <div class="desc"><?php echo $item['introduce']; ?></div>
</div>
<?php endforeach; ?>

<!-- 底部footer开始 -->
<div id="footer">
	<img src="<?php echo $this->_stylePath;?>/images/footer.png" width="100%" />
</div>
<!-- 底部footer结束 -->

