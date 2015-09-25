<?php 
$this->pageTitle = "{$model->title} " . Yii::app()->name;
$this->pageDesc ="{$model->introText} " . Yii::app()->name;
$this->pageOgTitle = "{$model->title} " . Yii::app()->name;
$this->pageOgDesc= "{$model->introText} " . Yii::app()->name;
$this->pageCanonical = "http://".$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; // canonical URLs should always be absolute
$this->pageSiteName = Yii::app()->name;
$this->pageAuthor = Yii::app()->name;
?>
<h1><?php echo CHtml::encode($model->title); ?></h1>
<?php if(!empty($model->image)): ?>
<div class="row">
  <div class="col-md-8"><p><?php echo CHtml::encode($model->description); ?></p></div>
  <div class="col-md-4"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/articles/400/<?php echo $model->image; ?>" align="right" width="300" style="float:right;border:1px solid #F2F2F2;"/></div>
</div>
<?php else:?>
<p><?php echo CHtml::encode($model->description); ?></p>
<?php endif;?>