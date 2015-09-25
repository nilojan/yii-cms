<div class="row">
  <div class="col-md-3">
  <h2>Dashboard</h2>
<?php include(Yii::app()->basePath . '/views/admin_sidebar.php'); ?>

</div>
<div class="col-md-9"> 

<h3>View Articles #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'title',
		'introText',
		'description',
		'image',
		'status',
		'createDate',
		'editDate',
	),
)); ?>
  </div>
</div>
