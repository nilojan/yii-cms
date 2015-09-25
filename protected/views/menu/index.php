<div class="row">
  <div class="col-md-3">
<?php include(Yii::app()->basePath . '/views/admin_sidebar.php'); ?>

	</div>
  
  <div class="col-md-9">

<h3>Menus</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div></div>