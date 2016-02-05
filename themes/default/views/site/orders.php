<?php $this->renderPartial('/layouts/nav2'); ?>

<?php if($orders): ?>
<?php foreach($orders as $item): ?>
<div class="search_list">
	<div class="left"><a href="<?php echo $this->createUrl('site/ordersDetail',array('order_code'=>$item['order_code']));?>"><img src="<?php echo $item['default_thumb']; ?>" width="80" height="75" /></a></div>
    <div class="right"><h4><a href="<?php echo $this->createUrl('site/ordersDetail',array('order_code'=>$item['order_code']));?>"><?php echo $item['goods_name']; ?></a><span>总计:￥<?php echo $item['total_price']; ?></span></h4>
       <p><?php echo $item['plan_name']; ?>x<?php echo $item['order_num']; ?>
       <?php if($item['status']==1):?>
       <font color="red">[未支付]</font>
<a href="<?php echo $this->createUrl('unionpay/pay',array('order_code'=>$item['order_code']));?>" style="color:green">银联支付</a>
       <?php elseif($item['status']==2):?>
       <font color="red">[已支付]</font>
       <?php elseif($item['status']==3):?>
       <font color="red">[已取消]</font>
       <?php elseif($item['status']==4):?>
       <font color="red">[支付失败]</font>
       <?php endif; ?>
       </p>
    </div>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="noresult">没有查到您的订单记录<div class="noresult">
<?php endif; ?>
