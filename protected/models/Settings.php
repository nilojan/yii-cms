<?php

/**
 * This is the model class for table "tbl_settings".
 *
 * The followings are the available columns in table 'tbl_settings':
 * @property integer $id
 * @property string $param
 * @property string $val
 * @property string $createDate
 * @property string $editDate
 */
class Settings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Settings the static model class
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
		return 'tbl_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('param, val', 'required'),
			array('param, val', 'length', 'max'=>99),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, param, val, createDate, editDate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'param' => 'Parameter',
			'val' => 'Value',
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
		$criteria->compare('param',$this->param,true);
		$criteria->compare('val',$this->val,true);
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
	
	
	public function loadSlider()
	{
		$sldr='';
	
		$sldr = '<div class="container-fluid">';

		$Slider = Yii::app()->db->createCommand()->select('*')->from('tbl_slider')->where('status=:su', array(':su'=>1))->queryAll(); 
		 
		if(!empty($Slider)): 
			$sldr = '<script type="text/javascript" src="'.Yii::app()->request->baseUrl.'/js/jssor.js"></script>';
			$sldr = '<script type="text/javascript" src="'.Yii::app()->request->baseUrl.'/js/jssor.slider.js"></script>';
			$sldr = '<script type="text/javascript" src="'.Yii::app()->request->baseUrl.'/js/jssor-settings.js"></script>';

       $sldr = '<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 100%; height: 240px; overflow: hidden;">';

	
		$sldr = '<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 100%; height: 240px; overflow: hidden;">';

                   foreach ($Slider as $k=>$linkk):
					$sldr = '<div class="sliderImage">';
					$sldr = '<img u="image" src="'.Yii::app()->request->baseUrl.'/images/slider/300/'.$linkk['imageName'].'" />';
					$sldr = '<p>'.$linkk['title'].'<p>';
					$sldr = '</div>';
				  endforeach;
			$sldr = '</div>';



			$sldr = '<div u="navigator" class="jssorb03" style="bottom: 4px; right: 6px;">';
				$sldr = '<div u="prototype"><div u="numbertemplate"></div></div>';
			$sldr = '</div>';

			$sldr = '<span u="arrowleft" class="jssora03l" style="top: 90px; left: -12px;"></span>';
			$sldr = '<span u="arrowright" class="jssora03r" style="top: 90px; right: -12px;"></span>';
		$sldr = '</div>';


		
		 endif;
		$sldr = '</div>';
	
		return $sldr;
	}		
		
}