<?php
/* @var $this SliderController */
/* @var $model Slider */
/* @var $form CActiveForm */
?>

<div class="form">

<div class="horizontal-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slider-form',
            'htmlOptions' => array('class' => 'form-horizontal',
                'role' => 'form',
				'enctype'=>'multipart/form-data'
            ),
	'enableAjaxValidation'=>true,

)); ?>

        <div class="form-group">
            <div class="col-lg-3 control-label">
                <div>
                    <p class="note">Fields with <span class="required">*</span> are required.</p>
                </div>
            </div>
            <div class="col-lg-5  has-error">
                <div class="help-block ">
                    <?php echo $form->errorSummary($model); ?>
                </div>
            </div>
        </div>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'title', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'placeholder' => 'Title','size'=>60,'maxlength'=>254)); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'title'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'desctiption', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-7">
                <?php echo $form->textArea($model, 'desctiption', array('class' => 'form-control', 'placeholder' => 'description')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'desctiption'); ?>
                </div>
            </div>
        </div>
		
		

        <div class="form-group">
            <?php echo $form->labelEx($model, 'imageName', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->fileField($model, 'imageName'); ?> 
				<div class="alert alert-danger" role="alert">use 1200px X 400px for best sliding effect</div>
                <div class="help-block">
                    <?php echo $form->error($model, 'imageName'); ?>
                </div>
            </div>
        </div>



        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-10">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-lg')); ?>
            </div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->