<?php
/* @var $this ArticlesController */
/* @var $data Articles */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('introText')); ?>:</b>
	<?php echo CHtml::encode($data->introText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<img src="../images/articles/400/<?php echo CHtml::encode($data->image); ?>" style="width:100px;"/>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status==1?"Active":"Not Active"); ?>
</div>