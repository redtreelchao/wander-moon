<?php

class Mb_Pay_Alipay_Config {

    // 萌宝商户帐号信息
	const PARTNER = "2088811604021320";		         // 合作身份者ID，以2088开头的16位纯数字
	const KEY = "196h5qr5d0dw3n98eic3k1koff3pf5xp";	 // 安全检验码，以数字和字母组成的32位字符
	const SELLER_EMAIL = "finance_tly@wander-moon.com";		 // 签约支付宝账号或卖家支付宝帐户

    // 支付宝接口信息
	const ALIPAY_AUTH	= "alipay.wap.trade.create.direct";   // 授权接口名称
	const ALIPAY_TRADE = "alipay.wap.auth.authAndExecute";           // 支付交易接口
	const FORMAR = "xml";    // 数据交互格式
	const SEC_ID  = "MD5";    // 请求信息加密方式
	const INPUT_CHARSET = "utf-8";  // 字符集
	const VERSION = "2.0";    // 接口版本

}
