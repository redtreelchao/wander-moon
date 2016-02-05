

<?php if($order_status==1): ?>
<div class="infobg">
	<h3>下单成功，您的订单号为：<?php echo $order_code;?>。</h3>
	<p style="margin-top:20px;">支付方式：</p>
    <form action="<?php echo Yii::app()->baseUrl.'/wechat/pay.php'; ?>" id="payForm" name="payForm" method="post">
    <input type="hidden" name="order_code" value="<?php echo $order_code; ?>"/>
    <p><a href="javascript::void(0)" class="buttons" id="paygo">微信支付</a></p>
    </form>
    <p><a href="<?php echo $this->createUrl('unionpay/pay',array('order_code'=>$order_code )); ?>" class="buttons">银联支付</a></p>
    <p style="margin-top:25px;">郑重承诺:<br/>未经预约100%全额退款.</p>
</div>
<div class="infobg" style="margin-top:3px;">
    <p>有任何问题请和我们联系:</p>
    <p><a href="tel:4009208581" class="buttons">人工回电</a></p>
    <p><a href="<?php echo $this->createUrl('site/contact',array('id'=>'contact')); ?>" class="buttons">在线咨询</a></p>
</div>
<?php else: ?>
<div class="infobg">
	<h3>您的订单提交失败</h3>
</div>
<div class="infobg" style="margin-top:3px;">
    <p>有任何问题请和我们联系:</p>
    <p><a href="tel:4009208581" class="buttons">人工回电</a></p>
    <p><a href="<?php echo $this->createUrl('site/contact',array('id'=>'contact')); ?>" class="buttons">在线咨询</a></p>
</div>
<?php endif; ?>

<script type="application/javascript">
	$("#paygo").click(function(){
		$("#payForm").submit();
	});
</script>

