<?php
/**
 * 内容管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class GoodsPlanController extends Backend
{
	protected $_goods;
	protected $_catalog;

	
	public function init(){
		parent::init();
		
		$goods = Goods::model()->findAll(array('order'=>'id desc','limit'=>100));
		foreach((array)$goods as $item){
			$this->_goods[''] = "==请选择主产品=="; 
			$this->_goods[$item->id] = $item->goods_name;
		}
		
	}
	
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action){
		$controller = Yii::app()->getController()->id;
		$action = $action->id;
		if(!$this->checkAcl($controller.'/'.$action)){
			$this->message('error',Yii::t('common','Access Deny'),$this->createUrl('index'),'',true);
			return false;
		}
		return true;
	}
	
    /**
     * 首页
     *
     */
	
    public function actionIndex() {
        $model = new GoodsPlan();
        $criteria = new CDbCriteria();
		$condition = '1=1';
        $goods_name = trim( $this->_request->getParam( 'plan_name' ) );
		$goods_name && $condition .= ' AND plan_name LIKE \'%' . $goods_name . '%\'';
		$goods_id = trim( $this->_request->getParam( 'goods_id' ) );     
		$goods_id && $condition .= ' AND goods_id  ='. $goods_id;       

        $criteria->condition = $condition;
        $criteria->order = 't.id DESC';
		$criteria->with = array('goods');
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 10;
        //根据plan_name,goods_id查询
        $pageParams = $this->buildCondition( $_GET, array ( 'plan_name'.'goods_id') );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );    

        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ) );
    }

    /**
     * 新增数据
     *
     */
    public function actionCreate() {
        
        $model = new GoodsPlan();       
    	if(isset($_POST['GoodsPlan']))
    	{
    		$model->attributes=$_POST['GoodsPlan'];
    		    	
    		//添加时间
    		$model->create_time = time();
    		
    		if($model->save())
    			$this->message('success',Yii::t('admin','Add Success'),$this->createUrl('index'));
    	}
    	//判断有无商品栏目
    	$goods = Goods::model()->find();
    	if(!$goods){
    		$this->message('error','请先添加商品信息',$this->createUrl('index'));
    	}
    	$this->render('update',array(
    			'model'=>$model,
    	));       
    }   

    /**
     * 更新
     *
     * @param  $id
     */
    public function actionUpdate( $id ) {
    	$model = GoodsPlan::model()->findByPk($id);    	
    	if(isset($_POST['GoodsPlan']))
    	{
    		$model->attributes=$_POST['GoodsPlan'];
    		    		
    		
    		if($model->save())
    			$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
    	}	
    	    	
    	$this->render('update',array(
    			'model'=>$model,   			
    	));    	
        
    }
   

    /**
     * 批量操作
     *
     */
    public function actionBatch() {
        if ( $this->method() == 'GET' ) {
            $command = trim( $_GET['command'] );
            $ids = intval( $_GET['id'] );
        } elseif ( $this->method() == 'POST' ) {
            $command = trim( $_POST['command'] );
            $ids = $_POST['id'];
        } else {
            $this->message( 'errorBack', Yii::t('admin','Only POST Or GET') );
        }
        empty( $ids ) && $this->message( 'error', Yii::t('admin','No Select') );

        switch ( $command ) {
        case 'delete':      
        	//删除商品     
        	foreach((array)$ids as $id){
        		$goodsModel = GoodsPlan::model()->findByPk($id);
        		if($goodsModel){
        			$goodsModel->delete();
        		}
        	}
            break;
       
        case 'show':     
        	//商品显示      
        	foreach((array)$ids as $id){
        		$goodsModel = GoodsPlan::model()->findByPk($id);        		
        		if($goodsModel){
        			$goodsModel->status = 'Y';
        			$goodsModel->save();
        		}
            }
            break;
        case 'hidden':     
        	//商品隐藏      
        	foreach((array)$ids as $id){
        		$goodsModel = GoodsPlan::model()->findByPk($id);        		
        		if($goodsModel){
        			$goodsModel->status = 'N';
        			$goodsModel->save();
        		}
            }
            break;
        case 'commend':     
        	//商品推荐
        	foreach((array)$ids as $id){        		
        		$recom_id = intval($_POST['recom_id']);
        		if($recom_id){
        			$goodsModel = GoodsPlan::model()->findByPk($id);
	        		if($goodsModel){
	        			$goodsModel->recommend = 'Y';
	        			$goodsModel->save();	        			
	        		}
        		}else{
        			$this->message('error', Yii::t('admin','RecommendPosition is Required'));
        		}
        	}                 
            break;
        case 'unCommend': 
        	//商品取消推荐
        	foreach((array)$ids as $id){
        		$goodsModel = GoodsPlan::model()->findByPk($id);
        		if($goodsModel){
        			$goodsModel->commend = 'N';
        			$goodsModel->save();
        		}
        	}                    
            break;        
         default:
            throw new CHttpException(404, Yii::t('admin','Error Operation'));
            break;
        }
        $this->message('success', Yii::t('admin','Batch Operate Success'));
    }
}
