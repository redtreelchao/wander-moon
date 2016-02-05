<?php if($goods): ?>
<?php foreach($goods as $item): ?>
<div class="search_list">
	<div class="left"><a href="<?php echo $this->createUrl('goods/buy',array('id'=>$item['id']));?>"><img src="<?php echo $item['default_thumb']; ?>" width="85px" height="90px"  /></a></div>
    <div class="right"><h4><a href="<?php echo $this->createUrl('goods/buy',array('id'=>$item['id']));?>"><?php echo $item['goods_name']; ?></a><span>￥<?php echo GoodsPlan::getMinPirce($item['id']); ?></span></h4>
       <p><img src="<?php echo $this->_stylePath;?>/images/shalou.png" height="12px;"/>&nbsp;<?php echo $item['sales_endtime']; ?>结束</p>
    </div>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="noresult">没有搜索到结果>>&nbsp;&nbsp;<a href="<?php echo $this->createUrl('site/search'); ?>">试试手气</a></div>
<?php endif; ?>
