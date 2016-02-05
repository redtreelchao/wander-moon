
<div class="ordersview">
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
    
</table>

</div>

<p><a href="<?php echo $this->createUrl('goods/buy',array('id'=>$goods->id)) ?>"><button type="button" class="btn btn-success btn-block">微信支付</button></a></p>
<div style="width:100%; height:6px;"></div>
<p><a href="<?php echo $this->createUrl('pay/alipay',array('order_code'=>$orders->order_code)) ?>"><button type="button" class="btn btn-warning btn-block">支付宝付款</button></a></p>







