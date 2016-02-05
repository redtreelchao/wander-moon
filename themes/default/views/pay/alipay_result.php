<?php if($result=='success'): ?>
<div class="infobg">
	<h3>您的订单已支付成功</h3>
    <p style="margin-top:25px;">郑重承诺:<br/>未经预约100%全额退款.</p>
</div>
<div class="infobg" style="margin-top:3px;">
    <p>您还可以:</p>
    <p><a href="<?php echo $this->createUrl('site/ordersDetail',array('order_code'=>$order_code )); ?>" class="buttons">查看订单</a></p>
    <p><a href="tel:4009208581" class="buttons">人工回电</a></p>
    <p><a href="<?php echo $this->createUrl('site/contact'); ?>" class="buttons">在线咨询</a></p>
    
</div>
<?php else: ?>
<div class="infobg">
	<h3>您的订单支付失败</h3>
</div>
<div class="infobg" style="margin-top:3px;">
    <p>有任何问题请和我们联系:</p>
    <p><a href="tel:4009208581" class="buttons">人工回电</a></p>
    <p><a href="<?php echo $this->createUrl('site/contact'); ?>" class="buttons">在线咨询</a></p>
</div>
<?php endif; ?>


