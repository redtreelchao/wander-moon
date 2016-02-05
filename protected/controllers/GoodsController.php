<?php
/**
 * 内容控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class GoodsController extends FrontBase
{
	protected $_menu_unique;
	public $layout = 'main_min';
	
	public function init(){
		parent::init();
	}
	
	public function actionView($id){
		$goods = Goods::model ()->findByPk ( intval ( $id ) );
		if (false == $goods){
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) 			);
		}
		// seo信息
		$this->_seoTitle = $goods->goods_name;
		
		//更新浏览次数
		$goods->updateCounters(array ('views' => 1 ), 'id=:id', array ('id' => $id ));
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/bootstrap3/css/bootstrap.min.css");
		$this->render('view',array('goods'=>$goods,));
	}
	
	public function actionBuy($id){
		
		$goods = Goods::model ()->findByPk ( intval ( $id ) );
		if (false == $goods ){
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) 			);
		}
		// seo信息
		$this->_seoTitle = $goods->goods_name;
		
		$goodsplan = GoodsPlan::model()->findAll('goods_id=:goods_id',array('goods_id'=>$id));
		
		$criteria=new CDbCriteria;  
    	$criteria->select='*'; // only select the 'title' column  
    	$criteria->condition='goods_id=:goods_id';  
    	$criteria->params=array(':goods_id'=>$id);  
    	$criteria->order='plan_price asc';  
    	$goodsplan=GoodsPlan::model()->findAll($criteria); // $params is not needed 
		//print_r($goodsplan);
		
		$this->render('buy',array('goods'=>$goods,'goodsplan'=>$goodsplan,'uid'=>$uid,'username'=>$username));
	}
	

  
}
