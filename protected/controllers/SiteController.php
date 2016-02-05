<?php
/**
 * 默认前端控制器
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 *
 */
class SiteController extends FrontBase
{	
	protected $_menu_unique;
	public $menu_tab;
	public function init(){
		parent::init();		
		//导航标示
		$this->_menu_unique = 'index';	
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{		
		//SEO
		$this->_seoTitle = $this->_setting['seo_title'];	
		$this->_seoKeywords = $this->_setting['seo_keywords'];
		$this->_seoDescription = $this->_setting['seo_description'];
		unset(Yii::app()->session['keyword']);
		//最新商品
		$goods = Goods::model()->getList(array('limit'=>10,'order'=>'t.is_top DESC, t.id DESC'));
		$this->render('index',array('goods'=>$goods));
	}
	
	

	/**
	 * 前端错误提示页(40x, 50x等)
	 */
	public function actionError()
	{		
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				//加载css,js
				Yii::app()->clientScript->registerCssFile($this->_stylePath . "/css/error.css");	
				Yii::app()->clientScript->registerScriptFile($this->_static_public . "/js/jquery/jquery.js");
				$this->_seoTitle = Yii::t('common','Notice Message').' - '.$this->_setting['site_name'];
				$this->render('error', $error);
			}
		}
	}
	
	public function actionSearch(){
		$keyword = $_POST['keyword'];
		
				//最新商品
		$criteria = new CDbCriteria();
		if($keyword){
			$criteria->compare('goods_name',$keyword,true);
		}
		$criteria->order = 't.id DESC';
		$data = Goods::model()->findAll($criteria);
		Yii::app()->session['keyword']=$keyword;
		$this->render('search',array('goods'=>$data ,'keyword'=>$keyword));
	}
	
	public function actionContact(){
	  $page = Page::model()->find('id=:id AND status=:status' , array(':id'=>'contact', ':status'=>'Y'));
      if(!$page){      	
      	throw new CHttpException(404, Yii::t('common','The requested page does not exist.'));
      }
	  $this->menu_tab = 'contact';
	  $this->render('contact',array('contact'=>$page,'menu_tab'=>'contact'));
	}
	
	public function actionSpecial(){
	  $criteria=new CDbCriteria;  
		$criteria->select='*'; 
		$criteria->condition='status=:status';  
		$criteria->params=array(':status'=>'Y');  
		$criteria->order='id DESC';  
		$post=Post::model()->findAll($criteria); // $params is not needed 
	  //$post = Post::model()->findall('status=:status' , array(':status'=>'Y'));
      if(!$post){      	
      	throw new CHttpException(404, Yii::t('common','The requested page does not exist.'));
      }
	  $this->menu_tab = 'special';
	  $this->render('special',array('post'=>$post,'menu_tab'=>'special'));
	}
	
	public function actionSpecialDetail($id){
		$post = Post::model ()->findByPk ( intval ( $id ) );
		if (false == $post ){
			throw new CHttpException ( 404, Yii::t ( 'common', 'The requested page does not exist.' ) 			);
		}
		// seo信息
		$this->_seoTitle = empty ( $post->seo_title ) ? $post->title : $goods->seo_title;
		
		//更新浏览次数
		$post->updateCounters(array ('view_count' => 1 ), 'id=:id', array ('id' => $id ));
		Yii::app()->clientScript->registerCssFile($this->_stylePath . "/bootstrap3/css/bootstrap.min.css");
		$this->menu_tab = 'special';
		$this->render('special_detail',array('post'=>$post,));
	}
	
	public function actionOrders(){
		$is_login = Yii::app()->session['is_login'];
		$uid = Yii::app()->session['uid'];
		$username = Yii::app()->session['username'];
		if(!isset($is_login) && !isset($uid) && empty($username) && ($is_login!=1)){
			$this->redirect($this->createUrl('user/login',array('ret_url'=>"site/orders")));
		}
		
		$criteria=new CDbCriteria;  
		$criteria->select='*'; 
		$criteria->condition='uid=:uid';  
		$criteria->params=array(':uid'=>$uid);  
		$criteria->order='id DESC';  
		$orders=Orders::model()->findAll($criteria); // $params is not needed  
		//$orders = Orders::model()->findAll('uid=:uid' , array(':uid'=>$uid));
		$this->menu_tab = 'orders';
		$this->render('orders',array('menu_tab'=>'orders','orders'=>$orders));
	}
	
	public function actionOrdersDetail($order_code){
		$is_login = Yii::app()->session['is_login'];
		$uid = Yii::app()->session['uid'];
		$username = Yii::app()->session['username'];
		if(!isset($is_login) && !isset($uid) && empty($username) && ($is_login!=1)){
			$this->redirect($this->createUrl('user/login',array('ret_url'=>"site/orders")));
		}
		
		
		$orders = Orders::model()->find('uid=:uid and order_code=:order_code' , array(':uid'=>$uid,':order_code'=>$order_code));
		$this->menu_tab = 'orders';
		$this->render('orders_detail',array('menu_tab'=>'orders','orders'=>$orders));
	}
		
	
	/**
	 * sitemap列表
	 */
	public function actionSitemap(){
		$this->layout = false;
		//rss创建
		$obj = new Sitemap();
	
		$this->render('sitemap',array('rss'=>$obj->show()));
	}
	
	/**
	 * sitemap索引
	 */
	public function actionSitemapXsl(){
		
		$this->render('sitemapxsl');
	}
	
	/**
	 * 
	 * 获取最新cms版本信息
	 * 
	 */
	public function actionVersion(){
		$cms = $this->_request->getParam('cms');
		$cms = unserialize(base64_decode($cms));
				
		//最新发布版本
		$newCMS = array('version'=>$this->_cmsVersion, 'release'=>$this->_cmsRelease);
		if($cms != $newCMS) {
			$html = <<<EOT
			document.getElementById('newCMS').innerHTML = '<span style="color:#F00; font-weight:bold">发现新版本，涉及重要更新，务必升级：{$newCMS['version']} {$newCMS['release']} <a href="http://www.yiifcms.com/soft/index/cat_11/" target="_blank">下载</a></span>';
EOT;
			
		}else{
			$html = <<<EOT
			document.getElementById('newCMS').innerHTML = '{$newCMS['version']} {$newCMS['release']}';
EOT;
		}
		echo $html;
	}
	
}
