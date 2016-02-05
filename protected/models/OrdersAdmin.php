<?php
/**
 * 
 * @author zhao jinhan <326196998@qq.com>
 * @link 
 *
 */
class OrdersAdmin extends CActiveRecord
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
			array('id, realname,mobile,status', 'required'),
			array('status', 'length', 'max'=>1),
			array('id, realname, mobile, status', 'safe', 'on'=>'search'),
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
	

	
}
