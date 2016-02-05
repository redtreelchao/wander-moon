<?php
/**
 * 内容控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class OrdersController extends FrontBase
{
	protected $_menu_unique;
	public $layout = 'main_min';
	
	public function init(){
		parent::init();
	}
	
	/*订单提交*/
	public function  actionIndex(){
		
		$post = $_POST;
		$plan_id = $post['plan'];
		$plan_data  = GoodsPlan::model()->findByPk(intval($plan_id));
		$goods_data  = Goods::model()->findByPk(intval($plan_data->goods_id));
		
		
		$realname = $post['realname'];
		$mobile = $post['mobile'];
		$order_num = $post['order_num'];
		$username  =$post['username'];
		$uid = $post['uid'];
		$order_code = $this->get_order_code();
		$plan_price  = $plan_data->plan_price;
		$plan_name  = $plan_data->plan_name;
		$goods_id  = $plan_data->goods_id;
		$total_price = intval($order_num)*$plan_price;
		$goods_name = $goods_data->goods_name;
		$default_thumb = $goods_data->default_thumb;
		$sales_endtime = $goods_data->sales_endtime;
		
		$is_login = Yii::app()->session['is_login'];
		$uid = Yii::app()->session['uid'];
		$username = Yii::app()->session['username'];
		if(!isset($is_login) && !isset($uid)  && ($is_login!=1)){
			$this->redirect($this->createUrl('user/login'));
		}

		$status=1; //已下单未支付
		if(empty($plan_id) || empty($uid) || empty($username) || empty($mobile) || empty($order_num) || empty($total_price) ){
			throw new CHttpException ( 404, '请求非法!!' );
		}
		else{
			$sql = "insert into orders(uid,order_code,username,goods_id,plan_id,order_num,plan_price,total_price,realname,mobile,goods_name,default_thumb,sales_endtime,plan_name,status) values($uid,$order_code,$username,$goods_id,$plan_id,$order_num,$plan_price,$total_price,'".$realname."',$mobile,'".$goods_name."','".$default_thumb."','".$sales_endtime."','".$plan_name."',$status)";
			$connection = Yii::app()->db; 
			$command = $connection->createCommand($sql);
			$rowCount = $command->execute();
			if($rowCount==1){
				$order_status=1;
			}else{
				$order_status=0;	
			}
		}
		$this->_seoTitle = '订购成功';
		//发送订购短信
		$sendurl = "http://116.213.72.20/SMSHttpService/send.aspx?username=tongle&password=tongle123&mobile=$username&content=【上海同乐旅行社】尊敬的客户$realname 您预定的产品订单已经生成 订单号:$order_code;产品名称:$goods_name;套餐名称:$plan_name;购买数量:$order_num;总价:$total_price; 请您及时付款,如有任何疑问欢迎拨打4009208581/021-63357992&Extcode=&senddate=&batchID=";
		//$sendurl =  "http://116.213.72.20/SMSHttpService/send.aspx?username=tongle&password=tongle123&mobile=$username&content=【上海同乐旅行社】您的注册验证码是1234，请在60秒内输入完成注册&Extcode=&senddate=&batchID=";
		@file_get_contents($sendurl);
		
		$this->render('index',array('order_status'=>$order_status, 'order_code'=>$order_code, 'goods_name'=>$goods_name, 'plan_name'=>$plan_name, 'plan_price'=>$plan_price, 'order_num'=>$order_num, 'total_price'=>$total_price));
	}
	
	public function actionView($id){
		$goods = Goods::model ()->findByPk ( intval ( $id ) );
		if (false == $goods || $goods->status == 'N'){
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) );
		}
		// seo信息
		$this->_seoTitle = empty ( $goods->seo_title ) ? $goods->goods_name : $goods->seo_title;
		
		//更新浏览次数
		$goods->updateCounters(array ('views' => 1 ), 'id=:id', array ('id' => $id ));
		$this->render('view',array('goods'=>$goods,));
	}
	
	public function get_order_code(){
		$randcode = '';
		for($i=1;$i<=4;$i++){
			$str = mt_rand(0,9);
			$randcode = $str.$randcode;
		}
		return date('Ymd').$randcode;	
	}
	
	public function actionPayment($order_code){
		$this->_seoTitle = '支付方式';
		$uid = Yii::app()->session['uid'];
		$username = Yii::app()->session['username'];
		$orders = Orders::model()->find('uid=:uid and order_code=:order_code' , array(':uid'=>$uid,':order_code'=>$order_code));

		$this->render('payment',array('orders'=>$orders, 'order_code'=>$order_code,));
	}
	
	public function actionTest(){
		$this->_seoTitle = '支付方式';
		$this->render('test');
	}

	

  
}
