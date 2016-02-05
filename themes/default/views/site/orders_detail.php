<?php $this->renderPartial('/layouts/nav2'); ?>

<div class="ordersview">
<p>订单详情:</p>
<table border="1px;" bgcolor="#fff" bordercolor="#999" width="100%">
	<tr>
		<td width="32%">&nbsp;订单编号</td>
        <td>&nbsp;<?php echo $orders->order_code; ?></td>
	</tr>
	<tr>
		<td width="32%">&nbsp;产品名称</td>
        <td>&nbsp;<?php echo $orders->goods_name; ?></td>
	</tr>
    <tr>
		<td>&nbsp;产品套餐</td>
        <td>&nbsp;<?php echo $orders->plan_name; ?>·</td>
	</tr>
    <tr>
		<td>&nbsp;单价</td>
        <td>&nbsp;<?php echo $orders->plan_price ?></td>
	</tr>
    <tr>
		<td>&nbsp;数量</td>
        <td>&nbsp;<?php echo $orders->order_num ?></td>
	</tr>
    <tr>
		<td>&nbsp;总价</td>
        <td>&nbsp;<?php echo $orders->total_price ?></td>
	</tr>
    <tr>
		<td>&nbsp;创建时间</td>
        <td>&nbsp;<?php echo $orders->create_time ?></td>
	</tr>
    <tr>
		<td>&nbsp;订单状态</td>
        <td>&nbsp;
        <?php if($orders['status']==1):?>
       <font color="red">[未支付]</font>&nbsp;&nbsp;<a href="<?php echo $this->createUrl('pay/alipay',array('order_code'=>$orders['order_code'] )); ?>">
       <?php elseif($orders['status']==2):?>
       <font color="red">[已支付]</font>
       <?php elseif($orders['status']==3):?>
       <font color="red">[已取消]</font>
       <?php elseif($orders['status']==4):?>
       <font color="red">[支付失败]</font></a>
       <?php endif; ?>
        </td>
	</tr>
</table>

</div>
