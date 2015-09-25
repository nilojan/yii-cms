<div class="row">
  <div class="col-md-3">
  <h2>Dashboard</h2>
<?php include(Yii::app()->basePath . '/views/admin_sidebar.php'); ?>

</div>
<div class="col-md-9">  
<div class="well well-sm"><h4>Latest Articles</h4></div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$Articles,
	'itemView'=>'_viewArticles',
)); ?>



<div class="well well-sm"><h4>Pages</h4></div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$Pages,
	'itemView'=>'_viewPage',
)); ?>




<div class="well well-sm"><h4>Menus</h4></div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$Menu,
	'itemView'=>'_viewMenu',
)); ?>
  </div>
</div>