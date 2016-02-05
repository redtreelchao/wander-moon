<?php
/**
 * 内容管理控制器类
 * 
 * @author        zhao jinhan <326196998@qq.com>
 * @copyright     Copyright (c) 2014-2015. All rights reserved.
 */

class OrdersController extends Backend
{

	
	public function init(){
		parent::init();
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
        $model = new Orders();
        $criteria = new CDbCriteria();
        $condition = "1=1";
        $username = trim( $this->_request->getParam( 'username' ) );     
        $order_code = trim( $this->_request->getParam( 'order_code' ) );
		$status = intval( $this->_request->getParam( 'status' ) );
        $username && $condition .= ' AND username LIKE \'%' . $username . '%\'';       
        $order_code && $condition .= ' AND order_code like  \'%' . $order_code . '%\'';   
		$status && $condition .= ' AND status= ' . $status;
        $criteria->condition = $condition;
        $criteria->order = 'id DESC';
        $count = $model->count( $criteria );
        $pages = new CPagination( $count );
        $pages->pageSize = 10;
        //根据goods_name,catelogId查询
        $pageParams = $this->buildCondition( $_GET, array ( 'username' , 'order_code','status') );
        $pages->params = is_array( $pageParams ) ? $pageParams : array ();
        $criteria->limit = $pages->pageSize;
        $criteria->offset = $pages->currentPage * $pages->pageSize;
        $result = $model->findAll( $criteria );    

        $this->render( 'index', array ( 'datalist' => $result , 'pagebar' => $pages ) );
    }

 
    /**
     * 更新
     *
     * @param  $id
     */
    public function actionUpdate( $id ) {

    	$model = OrdersAdmin::model()->findByPk($id);    	
	$order_payment = OrderPayment::model()->find('order_id=:order_id' , array(':order_id'=>$id));
	if ( !empty($order_payment) ){
		$order_payment = OrderPayment::model()->find('order_id=:order_id' , array(':order_id'=>$id));
		if ($order_payment->aid > 0)
		  {
		    $user = User::model ()->findByPk ($order_payment->aid);
		    
if (!empty ($user))
		      $admin_name = $user->username;
		    
		    else
		      $admin_name = '管理员ID'.$order_payment->aid;
		  

}else $admin_name = '系统';
		
		}

    	if(isset($_POST['OrdersAdmin']))
    	{
    		$model->attributes=$_POST['OrdersAdmin'];
    		    		
    		//更新时间
    		$model->update_time = date('Y-m-d H:i:s');
    		
    		if($model->save()){
    			$this->message('success',Yii::t('admin','Update Success'),$this->createUrl('index'));
			}
			else{
				$this->message('error',Yii::t('admin','Update error'),$this->createUrl('index'));
			}
				
    	} 	
    	    	
    	$this->render('update',array(
    			'model'=>$model,
    			'order_payment'=>$order_payment,
    			'admin_name'=>$admin_name,
    					
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
        		$goodsModel = Orders::model()->findByPk($id);
        		if($goodsModel){
        			
        			$goodsModel->delete();
        		}
        	}
            break;
       
        case 'show':     
        	//商品显示      
        	foreach((array)$ids as $id){
        		$goodsModel = Orders::model()->findByPk($id);        		
        		if($goodsModel){
        			$goodsModel->status = 'Y';
        			$goodsModel->save();
        		}
            }
            break;
        case 'hidden':     
        	//商品隐藏      
        	foreach((array)$ids as $id){
        		$goodsModel = Orders::model()->findByPk($id);        		
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
        			$goodsModel = Orders::model()->findByPk($id);
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
        		$goodsModel = Orders::model()->findByPk($id);
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
