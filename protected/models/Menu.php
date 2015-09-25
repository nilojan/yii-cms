<?php

/**
 * This is the model class for table "tbl_menu".
 *
 * The followings are the available columns in table 'tbl_menu':
 * @property integer $id
 * @property string $Title
 * @property string $shortText
 * @property integer $page_id
 * @property integer $level
 * @property string $createDate
 * @property string $editDate
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Title, shortText, page_id, level', 'required'),
			array('page_id, level , parent_id', 'numerical', 'integerOnly'=>true),
			array('Title', 'length', 'max'=>20),
			array('shortText', 'length', 'max'=>99),
			array('shortText', 'match', 'pattern' => "/^[A-Za-z0-9_-]+$/",'message'=> 'shortText must be Alphanumerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Title, shortText, page_id, level, parent_id, status, createDate, editDate', 'safe', 'on'=>'search'),
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
			'Page'=>array(self::BELONGS_TO, 'page', 'id','condition'=>'status=1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Title' => 'Title',
			'shortText' => 'Short Text',
			'page_id' => 'Target Page',
			'level' => 'Level',
			'parent_id' => 'Parent Menu',
			'status' => 'Status',
			'createDate' => 'Create Date',
			'editDate' => 'Edit Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('shortText',$this->shortText,true);
		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('level',$this->level);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('editDate',$this->editDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave() {
		if ($this->isNewRecord)
			$this->createDate = new CDbExpression('NOW()');
	 
		return parent::beforeSave();
	}	
}