<?php

require_once ("Function.php");
class Mb_Pay_Alipay_Alipay{ 
	/*
	 * 
	 */
	public static function getDataForXML($res_data,$node){
		return getDataForXML($res_data,$node);
	}
	
	/*
	 * 
	 */
	public static function getAlipayUrl($orderid,$userid,$total_price,$callbackUrl,$merchantUrl,$deadtime,$notify_url = NULL){
		// subject参数为商品名，不可为空
		//callbackUrl 用户通知
		$subject    = '购物（'.$orderid.'）';
	
		$param_auth = array (
				"req_data" => '<direct_trade_create_req><subject>' . $subject . '</subject><out_trade_no>'
				. $orderid . '</out_trade_no><total_fee>' . $total_price . "</total_fee><seller_account_name>"
				. Mb_Pay_Alipay_Config::SELLER_EMAIL. "</seller_account_name><notify_url>" . $notify_url. "</notify_url><out_user>"
				. $userid . "</out_user><merchant_url>" . $merchantUrl . "</merchant_url>" . "<call_back_url>"
				. $callbackUrl . "</call_back_url><pay_expire>".$deadtime."</pay_expire></direct_trade_create_req>",
				"service" => Mb_Pay_Alipay_Config::ALIPAY_AUTH,
				"sec_id" => Mb_Pay_Alipay_Config::SEC_ID,
				"partner" => Mb_Pay_Alipay_Config::PARTNER,
				"req_id" => date ( "Ymdhms" ),
				"format" => Mb_Pay_Alipay_Config::FORMAR,
				"v" => Mb_Pay_Alipay_Config::VERSION
			);
	
		// 构造支付请求对象
		$alipay = new Mb_Pay_Alipay_Service();
		// 调用授权接口,获取token
		$token = $alipay->alipay_wap_trade_create_direct($param_auth, Mb_Pay_Alipay_Config::KEY, Mb_Pay_Alipay_Config::SEC_ID);
		// 判断是否成功获取token
		if($token == '签名不正确'){
			return $token;
		}
	
		// 构造支付交易请求参数数组
		$param_trade =  array (
				"req_data" => "<auth_and_execute_req><request_token>".$token."</request_token></auth_and_execute_req>",
				"service" => Mb_Pay_Alipay_Config::ALIPAY_TRADE,
				"sec_id" => Mb_Pay_Alipay_Config::SEC_ID,
				"partner" => Mb_Pay_Alipay_Config::PARTNER,
				"call_back_url" => $callbackUrl,
				"format" => Mb_Pay_Alipay_Config::FORMAR,
				"v" => Mb_Pay_Alipay_Config::VERSION
		);
		$result = $alipay->alipay_Wap_Auth_AuthAndExecute($param_trade, Mb_Pay_Alipay_Config::KEY);
		return $result;
	}
	
}