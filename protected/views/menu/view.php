<div class="row">
  <div class="col-md-3">
<?php include(Yii::app()->basePath . '/views/admin_sidebar.php'); ?>

	</div>
  
  <div class="col-md-9">

<h3>View Menu #<?php echo $model->Title; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Title',
		'shortText',
		'page_id',
		'level',
		'status',

	),
)); ?>
 </div>
</div>
