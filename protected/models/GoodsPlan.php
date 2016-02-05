<?php

/**
 * This is the model class for table "{{goods_plan}}".
 *
 * The followings are the available columns in table '{{goods_plan}}':
 * @property string $id
 * @property string $goods_name
 * @property string $catalog_id
 * @property string $price
 * @property string $default_image
 * @property string $default_thumb
 * @property string $image_list
 * @property string $content
 * @property string $views
 * @property string $sales
 * @property string $create_time
 * @property string $update_time
 * @property string $status
 * @property integer $recom_id
 * @property integer $sort_order
 */
class GoodsPlan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods_plan}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goods_id', 'numerical', 'integerOnly'=>true),
			array(' plan_name, status, create_time', 'length', 'max'=>30),
			array('plan_desc,plan_price', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, goods_id,plan_name, plan_price, plan_desc, create_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
	        'goods'=>array(self::BELONGS_TO, 'Goods', 'goods_id','alias'=>'g', 'select'=>'id,goods_name'),
	    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'create_time' => 'Create Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('goods_name',$this->goods_name,true);


		return new CActiveDataProvider('GoodsPlan', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Goods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * 获取一定条件下的商品
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
		$criteria->params = array(':status'=> 'Y');
		$criteria->with = array ( 'goods' );
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
	
	public static function getMinPirce($goods_id){
		$criteria = new CDbCriteria();
		$criteria->condition = 'goods_id=:goods_id';
		$criteria->order = 'plan_price asc';
		$criteria->params = array(':goods_id'=> $goods_id);
		$data = self::model()->find($criteria);
		//print_r($data->plan_price);
		if($data->plan_price >1){
			$price = explode('.', $data->plan_price);
			return $price[0];
		}else{
			return $data->plan_price;
		}
		

	}
}