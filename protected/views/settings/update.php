<div class="row">
  <div class="col-md-3">
  <h2>Dashboard</h2>
<?php include(Yii::app()->basePath . '/views/admin_sidebar.php'); ?>

</div>
<div class="col-md-9"> 

<h3>Update Settings <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
  </div>
</div>