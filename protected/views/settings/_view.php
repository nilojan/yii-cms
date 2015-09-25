<?php
/* @var $this SettingsController */
/* @var $data Settings */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('param')); ?>:</b>
	<?php echo CHtml::encode($data->param); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('val')); ?>:</b>
	<?php echo CHtml::encode($data->val); ?>
	<br />



</div>