<?php
/* @var $this MenuController */
/* @var $data Menu */
?>

<div class="view panel">
	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortText')); ?>:</b>
	<?php echo CHtml::encode($data->shortText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status==1?"Active":"Not Active"); ?>
</div>