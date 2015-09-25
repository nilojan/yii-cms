<?php
/* @var $this SliderController */
/* @var $data Slider */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desctiption')); ?>:</b>
	<?php echo CHtml::encode($data->desctiption); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imageName')); ?>:</b>
	<?php echo CHtml::encode($data->imageName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status==1?"Active":"Not Active"); ?>
</div>