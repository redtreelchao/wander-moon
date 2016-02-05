<?php 
//获取提交过来的商品信息
session_start();
error_reporting(E_ERROR &~E_NOTICE);
$order_code = $_REQUEST['order_code'];
if(!empty($order_code)){
	$_SESSION['order_code'] = $order_code;
}
elseif(!empty($_SESSION['order_code'])){
	$order_code=$_SESSION['order_code'];
}
else{
	die("您请求的数据不完整");		
}

ini_set('date.timezone','Asia/Shanghai');
require_once "lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';


$hostname="localhost"; //定义连接到的mysql服务器名
$username="root"; //定义用于连接的用户名
$password="Andrew1024"; //定义用于连接的密码
$dbname="pro_wandermoon";
$link=mysql_connect($hostname,$username,$password); //打开msql连接
mysql_query('set names utf8;'); //转换编码以支持中文
mysql_select_db($dbname); //选择操作库为test
$query="select * from orders where order_code=$order_code"; //定义sql
$result=mysql_query($query); //发送sql查询
$order_data=mysql_fetch_row($result);
if($order_data){
	 $order_code = $order_data[2];
	 $goods_name = $order_data[12];
	 $plan_name = $order_data[13];
	 $plan_price = $order_data[7];
	 $order_num = $order_data[6];
	 $total_price = $order_data[8];
}else{
	die("您请求的数据不完整");	
}
//print_r($order_data);
//释放结果集
mysql_free_result($result);

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody('wandermoon');
$input->SetAttach('wandermoon');
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee($total_price*100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag('wandermoon');
$input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
//$input->SetNotify_url("http://wdm.3350.cc/wechat/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);


$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台"网页授权接口"，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
$return_url="http://".$_SERVER['SERVER_NAME']."/pay/wechatResult?order_code=$order_code";

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <link rel="stylesheet" type="text/css" href="/themes/default/styles/bootstrap3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/themes/default/styles/css/global.css"/>		
	
    <title>我的鹿-微信安全支付</title>
	
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				//WeixinJSBridge.log(res.err_msg);
				//alert(res.err_code+res.err_desc+res.err_msg);
				if(res.err_msg == "get_brand_wcpay_request:ok" ) 
				 {
					  //alert(res.err_msg);
					  window.location.href="<?php echo $return_url ?>";
					  <?php //header("location:$return_url");exit; ?>
				 }
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	
	
	</script>
</head>
<body>

<div class="web640">
	<!-- 头部header开始 -->
	<a href='<?php echo "http://".$_SERVER['HTTP_HOST']; ?>'>
    <div  class="header_min" style="height:50px;">
		我的鹿-微信安全支付
	</div>
    </a>
	<!-- 头部header结束 -->
   <div class="ordersview">
<table border="1px;" bgcolor="#fff" bordercolor="#999" width="100%">
	<tr>
		<td width="32%">&nbsp;订单编号</td>
        <td>&nbsp;<?php echo $order_code; ?></td>
	</tr>
	<tr>
		<td width="32%">&nbsp;产品名称</td>
        <td>&nbsp;<?php echo $goods_name; ?></td>
	</tr>
    <tr>
		<td>&nbsp;产品套餐</td>
        <td>&nbsp;<?php echo $plan_name; ?>·</td>
	</tr>
    <tr>
		<td>&nbsp;单价</td>
        <td>&nbsp;<?php echo $plan_price; ?></td>
	</tr>
    <tr>
		<td>&nbsp;数量</td>
        <td>&nbsp;<?php echo $order_num; ?></td>
	</tr>
    <tr>
		<td>&nbsp;总价</td>
        <td>&nbsp;<?php echo $total_price; ?></td>
	</tr>
    
 </table>

 </div>

 <p><a href="javascript::vaid(0)" onClick="callpay()"><button type="button" class="btn btn-success btn-block">微信支付</button></a></p>
 <div style="width:100%; height:6px;"></div>

</div>
</body>
</html>
