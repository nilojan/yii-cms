<?php 
if($model->id != Yii::app()->config->get('article_page')){
	// this is page
$this->pageTitle = "{$model->title} " . Yii::app()->name;
$this->pageDesc ="{$model->introText} " . Yii::app()->name;
$this->pageOgTitle = "{$model->title} " . Yii::app()->name;
$this->pageOgDesc= "{$model->introText} " . Yii::app()->name;
$this->pageCanonical = "http://".$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; // canonical URLs should always be absolute
$this->pageSiteName = Yii::app()->name;
$this->pageAuthor = Yii::app()->name;
//echo"<pre>";print_r($model);echo"</pre>";
?>
<h1><?php echo CHtml::encode($model->title); ?></h1>
<?php if(!empty($Page->image)): ?>
<div class="row">
  <div class="col-md-8"><p><?php echo CHtml::encode($Page->description); ?></p></div>
  <div class="col-md-4"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/page/400/<?php echo $Page->image; ?>" align="right" width="300" style="float:right;float:right;border:1px solid #F2F2F2;"/></div>
</div>
<?php else:?>
<p><?php echo CHtml::encode($model->description); ?></p>
<?php endif;?>
<?php }else{ // this is article 
$this->pageTitle = "{$model->title} " . Yii::app()->name;
$this->pageDesc ="{$model->introText} " . Yii::app()->name;
$this->pageOgTitle = "{$model->title} " . Yii::app()->name;
$this->pageOgDesc= "{$model->introText} " . Yii::app()->name;
$this->pageCanonical = "http://".$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; // canonical URLs should always be absolute
$this->pageSiteName = Yii::app()->name;
$this->pageAuthor = Yii::app()->name;
?>
<?php $dataProvider=new CActiveDataProvider('Articles', array('criteria'=>array(
                                                                   'order'=>'createDate DESC',
                                                                    'condition'=>'t.status = 1',
                                                                    ),
                                                                     'pagination'=>array('pageSize'=>30,),
                                                )); 
       
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_ArtView',
			'ajaxUpdate'=>false,
			'summaryText' => '',
			'pager' => array(
				'maxButtonCount'=>4,
				'hiddenPageCssClass' => 'disabled',
			    'selectedPageCssClass' => 'active',  
				'firstPageLabel' => '&laquo;',
				'lastPageLabel' => '&raquo;',
				'nextPageLabel' => '&rsaquo;',
				'prevPageLabel' => '&lsaquo;',
				'header' => '',
				'htmlOptions' => array(
					'class' => 'pagination',
					),		
                ),
			)); ?>
<?php } ?>