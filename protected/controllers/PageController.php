<?php

class PageController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/jumbotron';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
            array(
                'application.extensions.html.ECompressHtmlFilter',
                'gzip'    => false,
                'actions' => '*'
            ),			
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','page'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(''),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionPage($shortText)
	{
	
		$page_id = Yii::app()->db->createCommand("SELECT page_id from tbl_menu WHERE `shortText`= '".$shortText."'")->queryScalar();		
		
		//echo "<pre>"; print_r($page_id);echo "</pre>";

		$Page = Page::model()->find('id=:id', array('id' => $page_id)); 
		$this->render('view',array(
			'model'=>$Page,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Page;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Page']))
		{
			$model->attributes=$_POST['Page'];
			$model->uid = Yii::app()->user->getId();
			$uploadedImage=CUploadedFile::getInstance($model,'image');
			//echo'<pre>';print_r($uploadedImage);echo'</pre>';

			if(isset($uploadedImage)){
				$ephoto = str_replace(' ', '-', "{$uploadedImage->name}");
				$ephoto = 'page_pic_'.$ephoto;
				$uploadedImage->saveAs(Yii::app()->basepath.'/../images/page/'.$ephoto);
				$image = Yii::app()->image->load(Yii::app()->basepath.'/../images/page/'.$ephoto);
				$image->resize(400, 0);								
				$image->save(Yii::app()->basepath.'/../images/page/400/'.$ephoto);
				$croped_articl = Page::cropImage(Yii::app()->basepath.'/../images/page/400/'.$ephoto);
				$model->image = $ephoto;	
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Page']))
		{
			$model->attributes=$_POST['Page'];
			$model->uid = Yii::app()->user->getId();
			$uploadedImage=CUploadedFile::getInstance($model,'image');
			//echo'<pre>';print_r($uploadedImage);echo'</pre>';

			if(isset($uploadedImage)){
				$ephoto = str_replace(' ', '-', "{$uploadedImage->name}");
				$ephoto = 'page_pic_'.$ephoto;
				$uploadedImage->saveAs(Yii::app()->basepath.'/../images/page/'.$ephoto);
				$image = Yii::app()->image->load(Yii::app()->basepath.'/../images/page/'.$ephoto);
				$image->resize(400, 0);								
				$image->save(Yii::app()->basepath.'/../images/page/400/'.$ephoto);
				$croped_articl = Page::cropImage(Yii::app()->basepath.'/../images/page/400/'.$ephoto);
				$model->image = $ephoto;	
			}			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Page');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Page('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Page']))
			$model->attributes=$_GET['Page'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Page the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Page::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Page $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='page-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
