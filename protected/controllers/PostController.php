<?php
/**
 * 内容控制器
 *
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015 . All rights reserved. 
 */
class PostController extends FrontBase
{
	protected $_menu_unique;
	public $layout = 'main';
	
	public function init(){
		parent::init();
	}
	
	public function actionView($id){
		$post = Post::model ()->findByPk ( intval ( $id ) );
		if (false == $post || $post->status == 'N'){
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) 			);
		}
		// seo信息
		$this->_seoTitle = empty ( $post->seo_title ) ? $post->title : $goods->seo_title;
		
		//更新浏览次数
		$post->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/bootstrap3/css/bootstrap.min.css");
		$this->menu_tab = 'special';
		$this->render('view',array('post'=>$post,));
	}
	
	public function actionBuy(){
		$this->render('buy');
	}
	

  
}
