<?php
/**
 * 付款控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
 
header("Content-type: text/html; charset=utf-8"); 

Yii::import('application.vendors.*');
include_once('Unionpay/common.php');
include_once('Unionpay/SDKConfig.php');
include_once('Unionpay/log.class.php');
include_once('Unionpay/secureUtil.php');

class UnionpayController extends FrontBase
{	

	public function init(){
		parent::init();			
	}
public function actionTest_abc(){
$data = array (
  'accessType' => '0',
  'bizType' => '000201',
  'certId' => '21267647932558653966460913033289351200',
  'currencyCode' => '156',
  'encoding' => 'utf-8',
  'merId' => '898110279910126',
  'orderId' => '201507314167',
  'queryId' => '201507311738344648388',
  'reqReserved' => '$orders->goods_name',
  'respCode' => '00',
  'respMsg' => 'success',
  'settleAmt' => '1',
  'settleCurrencyCode' => '156',
  'settleDate' => '0731',
  'signMethod' => '01',
  'signature' => 'f3cBW8iD0eBWC4sRXFxR1EXnuqD6R4cGNvIBIeaNdX4cWe3ofwBldq1sTXVVx0k51hskmCqEfkk6kX87R+Rgl5zL8L95qvcfy2T77FcTmHx07kZ77WI7BMwgQGlfotkVCXOjXUSPkeeowKX8/KSb84/z0pQrv4kaovODgpB5kPxdcc1942U8VjaBPCpyFQhY8V7kkpqqDuWExtsTdOAqzsKtHNKfsGuOMrqmQ5ERJ/hY1TCswUnqNKVqx/vE467FDDx28peirC7M4SKmWVy7g8vtmEI97jIniuTWgtOf2v/IdvIHNuunaIDLrTZVNpxV6RmGdN5tS6PKHn1Uoh4j1Q==',
  'traceNo' => '464838',
  'traceTime' => '0731173834',
  'txnAmt' => '1',
  'txnSubType' => '01',
  'txnTime' => '20150731173834',
  'txnType' => '01',
  'version' => '5.0.0',
) ;
$url = SDK_FRONT_NOTIFY_URL;
$url = SDK_BACK_NOTIFY_URL;
$result = $this->post( $url, $data );
echo $result;

}
		public function post($gateway_url, $data) {
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $gateway_url ); // 配置网关地址
		curl_setopt ( $ch, CURLOPT_HEADER, 0 ); // 过滤HTTP头
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POST, 1 ); // 设置post提交
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data); // post传输数据
		$data = curl_exec ( $ch );
		curl_close ( $ch );
		return $data;
	}
	
	public function actionPay($order_code){
		$is_login = Yii::app()->session['is_login'];
		$uid = Yii::app()->session['uid'];
		$username = Yii::app()->session['username'];
		if(!isset($is_login) && !isset($uid) && empty($username) && ($is_login!=1)){
			$this->redirect($this->createUrl('user/login'));
		}
		$orders = Orders::model()->find('uid=:uid and order_code=:order_code' , array(':uid'=>$uid,':order_code'=>$order_code));
		if(empty($order_code) || empty($orders)){
			throw new CHttpException(400,Yii::t('yii','Your request is invalid.'));
		}
		$pay_price  = (int)($orders->total_price * 100);

		$params = array(
                'version' => '5.0.0',                           //版本号
                'encoding' => 'utf-8',                          //编码方式
                'certId' => getSignCertId (),                   //证书ID
                'txnType' => '01',                              //交易类型
                'txnSubType' => '01',                           //交易子类
                'bizType' => '000201',                          //业务类型
                'frontUrl' =>  SDK_FRONT_NOTIFY_URL,            //前台通知地址
                'backUrl' => SDK_BACK_NOTIFY_URL,               //后台通知地址
                'signMethod' => '01',           //签名方法
                'channelType' => '08',          //渠道类型，07-PC，08-手机
                'accessType' => '0',            //接入类型
                'merId' => '898110279910126',                   //商户代码，请改自己的测试商户号
                'orderId' => $orders->order_code,    //商户订单号
                'txnTime' => date('YmdHis'),    //订单发送时间
                'txnAmt' => $pay_price,              //交易金额，单位分
                'currencyCode' => '156',        //交易币种
                'defaultPayType' => '0001',     //默认支付方式
                //'orderDesc' => $orders->goods_name,  //订单描述，网关支付和wap支付暂时不起作用
                'reqReserved' =>$orders->goods_name, //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现
                );
		sign ( $params );

		// 前台请求地址
		$front_uri = SDK_FRONT_TRANS_URL;
		// 构造 自动提交的表单
		$html_form = create_html ( $params, $front_uri );
		echo $html_form;exit;
	}
// 异步回调	
	public function actionNotify(){
// respCode=00&respMsg=success&settleAmt=100
		if( verify ( $_POST ) && $_POST['respCode'] =='00' ){
			$this->update_order();
		}
		echo 'notify ed.';
	}
	
// 同步回调	
	public function actionReturn(){
		if( verify ( $_POST ) && $_POST['respCode'] =='00' ){
			$this->update_order();
		}
		$this->redirect($this->createUrl('site/orders?msg='.urlencode('订单支付成功，订单号为：'.$_POST['orderId'])));
	}

//更新订单
	private function update_order(){
		$order_code = $_POST['orderId'];
		$orders = Orders::model()->find('order_code=:order_code' , array(':order_code'=>$order_code));
		if(empty($order_code) || empty($orders)){
			throw new CHttpException(400,Yii::t('yii','Your request is invalid.'));
		}
		// 如果订单已经支付过
		if( $orders->status == 2 ) {
			return array( 'code'=> 'success', 'msg'=> '您的订单已经支付成功。' );
			exit;
		}
                $connection = Yii::app()->db;
		$sql = "update orders set payment='unionpay', status=2, update_time=CURRENT_TIMESTAMP WHERE order_code=".$order_code;
                $command = $connection->createCommand($sql);
                $command->execute();
		$memo = @var_export($_POST,true);

		$sql = "insert into order_payment(order_id,order_code,pay_code,amount,add_time,aid,memo) values " .
			"(".$orders->id.",$order_code,'unionpay',".$_POST['txnAmt'].",".time().",0,".$connection->quoteValue($memo).")";
                $command = $connection->createCommand($sql);
                $command->execute();
		return array( 'code'=> 'success', 'msg'=> '订单支付成功。' );
		
	}
	
}
