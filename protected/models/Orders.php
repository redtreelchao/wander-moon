<?php
/**
 * 
 * @author zhao jinhan <326196998@qq.com>
 * @link 
 *
 */
class Orders extends CActiveRecord
{
	
	/**
	 * @return string 相关的数据库表的名称
	 */
	public function tableName()
	{
		return '{{orders}}';
	}

	/**
	 * @return array 对模型的属性验证规则.
	 */
	public function rules()
	{
		return array(
			array('id, uid', 'required'),
			array('uid, goods_id,plan_id,order_num', 'numerical', 'integerOnly'=>true),
			array('user_id, view_count, favorite_count, update_time, reply_count, sort_desc, create_time', 'length', 'max'=>10),
			array('order_code, username, plan_price,total_price,payment,realname,mobile,goods_name,plan_name,create_time,update_time', 'length', 'max'=>100),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uid, order_code, username, goods_id, plan_id, order_num, plan_price, total_price, payment, realname, mobile, goods_name, plan_name, status, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array 关联规则.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
	        //'catalog'=>array(self::BELONGS_TO, 'Catalog', 'catalog_id', 'alias'=>'catalog', 'select'=>'id,catalog_name,type'),
	    );
	}

	/**
	 * @return array 自定义属性标签 (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
		);
	}


	/**
	 * 返回指定的AR类的静态模型.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * 获取一定条件下的文章
	 * @param array $params = ('condition'=> '额外条件', 'order'=>'排序', 'with'=>'关联表', 'limit'=>'条数', 'page'=>'是否分页')
	 * @param $pages 分页widget
	 * @return array
	 */
	public static function getList($params = array(), &$pages = null){
		$data = array();
		$pages = array();
		
		//组合条件
		$criteria = new CDbCriteria();
		$criteria->condition = 't.status=:status';
		$params['condition'] && $criteria->condition .= $params['condition'];		
		$criteria->order = $params['order']?$params['order']:'t.id DESC';
		$criteria->with = array ( 'catalog' );
		$criteria->select = "t.title, t.id,t.title_style, t.attach_thumb, t.image_list,";
		$criteria->select .= " t.copy_from, t.copy_url, t.update_time,t.introduce, t.tags, t.view_count";
		$criteria->params = array(':status'=> 'Y');
		$params['with'] && $criteria->with = (array)$params['with'];
		
		$limit = $params['limit']>0?intval($params['limit']):15;
		//是否分页
		if($params['page']){
			//分页
			$count = self::model()->count( $criteria );
			$pages = new CPagination( $count );
			$pages->pageSize = $limit;	
			$criteria->limit = $pages->pageSize;
			$criteria->offset = $pages->currentPage * $pages->pageSize;
		}else{
			$criteria->limit = $limit;
		}	
		
		$data = self::model()->findAll($criteria);					
		return $data;
	}
	
}
