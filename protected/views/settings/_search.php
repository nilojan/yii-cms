<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'param'); ?>
		<?php echo $form->textField($model,'param',array('size'=>60,'maxlength'=>99)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'val'); ?>
		<?php echo $form->textField($model,'val',array('size'=>60,'maxlength'=>99)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->