<?php
/**
 * 付款控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
 
header("Content-type: text/html; charset=utf-8"); 

Yii::import('application.vendors.*');
require_once('Alipay/Alipay.php');
require_once('Alipay/Config.php');
require_once('Alipay/Service.php');
require_once('Alipay/Notify.php');

class PayController extends FrontBase
{	

	public function init(){
		parent::init();			
	}
	
	
	public function actionAlipay($order_code){
		
		$is_login = Yii::app()->session['is_login'];
		$uid = Yii::app()->session['uid'];
		$username = Yii::app()->session['username'];
		if(!isset($is_login) && !isset($uid) && empty($username) && ($is_login!=1)){
			$this->redirect($this->createUrl('user/login'));
		}
		$orders = Orders::model()->find('uid=:uid and order_code=:order_code' , array(':uid'=>$uid,':order_code'=>$order_code));
		if(empty($order_code) || empty($orders)){
			echo "Request Illegal!";exit;	
		}
		//构造需要传入的参数
		$order_id = $order_code;
		$userid = $uid;
		$total_price  = $orders['total_price'];
		$callbackUrl = 'http://'.$_SERVER['SERVER_NAME'].$this->createUrl('pay/alipayResult');
		$merchantUrl = 'http://'.$_SERVER['SERVER_NAME'].Yii::app()->homeUrl;
		$datetime = date('Y-m-d H:i:s',strtotime('+1 day'));
		$notify_url = 'http://'.$_SERVER['SERVER_NAME'].$this->createUrl('pay/alipayNotify');
		$alipay = new Mb_Pay_Alipay_Alipay();
		$payurl = $alipay->getAlipayUrl($order_id,$userid,$total_price,$callbackUrl,$merchantUrl,$datetime,$notify_url);
		$this->redirect($payurl);
		
	}
	
	public function actionAlipayNotify(){
		$alipay = new Mb_Pay_Alipay_Notify(Mb_Pay_Alipay_Config::PARTNER,Mb_Pay_Alipay_Config::KEY,Mb_Pay_Alipay_Config::SEC_ID,Mb_Pay_Alipay_Config::INPUT_CHARSET);
		$verify_result = $alipay->notify_verify();
		if($verify_result){
			$res_data = $_POST['notify_data'];
			$order_code = Mb_Pay_Alipay_Alipay::getDataForXML($res_data,'/notify/out_trade_no');
			$amount = Mb_Pay_Alipay_Alipay::getDataForXML($res_data,'/notify/total_fee');
			$trade_status = getDataForXML($res_data,'/notify/trade_status');
			if($trade_status=='TRADE_SUCCESS'){
				echo "success";	
			}
			else{
				echo "fail";	
			}	
		}
		else{
			echo "fail";	
		}	
	}
	
	public function actionAlipayResult(){

		$result = $_GET['result'];
		$order_code = $_GET['out_trade_no'];
		$trade_no = $_GET['trade_no'];
		if($result=='success'){
		       Orders::model()->updateAll(array('status'=>2),'order_code=:order_code',array(':order_code'=>$order_code)); 
	    }
		$this->_seoTitle = '支付成功';
		$this->render('alipay_result',array('result'=>$result,'order_code'=>$order_code));
	}
	
	public function actionWechatResult(){

		$order_code = $_GET['order_code'];
		Orders::model()->updateAll(array('status'=>2),'order_code=:order_code',array(':order_code'=>$order_code)); 
		$this->_seoTitle = '支付成功';
		$result = 'success';
		$this->render('alipay_result',array('result'=>$result,'order_code'=>$order_code));
	}
	
	
}