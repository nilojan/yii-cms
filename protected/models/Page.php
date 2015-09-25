<?php

/**
 * This is the model class for table "tbl_page".
 *
 * The followings are the available columns in table 'tbl_page':
 * @property integer $id
 * @property integer $uid
 * @property string $title
 * @property string $introText
 * @property string $description
 * @property string $createDate
 * @property string $editDate
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
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
		return 'tbl_page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' title, introText, description', 'required'),
			array('uid', 'numerical', 'integerOnly'=>true),
			array('title, introText', 'length', 'max'=>254),
			array('image', 'file', 'types'=>'png,jpg,gif','safe'=>true, 'allowEmpty'=>true,'on'=>'insert,update','wrongType'=>'Only JPG/PNG/GIF allowed.','maxSize'=>1024 * 1024 * 1, 'tooLarge'=>'Image has to be smaller than 1MB'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, title, introText, image, description, createDate, editDate', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'title' => 'Title',
			'introText' => 'Intro Text',
			'description' => 'Description',
			'image' => 'Image',
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
		$criteria->compare('uid',$this->uid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('introText',$this->introText,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
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

	public static function cropImage($logoimage){

		$orig_filename = $logoimage;
		$new_filename = $logoimage;

		$ext = pathinfo($orig_filename, PATHINFO_EXTENSION);

		list($orig_w, $orig_h) = getimagesize($orig_filename);

		$orig_img = imagecreatefromstring(file_get_contents($orig_filename));

		$output_w = 400;
		$output_h = 400;

		// determine scale based on the longest edge
		if ($orig_h > $orig_w) {
			$scale = $output_h/$orig_h;
		} else {
			$scale = $output_w/$orig_w;
		}

		// calc new image dimensions
		$new_w =  $orig_w * $scale;
		$new_h =  $orig_h * $scale;

		//echo "Scale: $scale<br />";
		//echo "New W: $new_w<br />";
		//echo "New H: $new_h<br />";
		//echo "$ext";

		// determine offset coords so that new image is centered
		$offest_x = ($output_w - $new_w) / 2;
		$offest_y = ($output_h - $new_h) / 2;

			// create new image and fill with background colour
		$new_img = imagecreatetruecolor($output_w, $output_h);
		$bgcolor = imagecolorallocate($new_img, 255, 255, 255); // red
		imagefill($new_img, 0, 0, $bgcolor); // fill background colour

			// copy and resize original image into center of new image
		imagecopyresampled($new_img, $orig_img, $offest_x, $offest_y, 0, 0, $new_w, $new_h, $orig_w, $orig_h);

			//save it
		imagejpeg($new_img, $new_filename, 80);
	}	
	
}