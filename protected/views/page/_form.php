<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="horizontal-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articles-form',
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
            <?php echo $form->labelEx($model, 'introText', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'introText', array('class' => 'form-control', 'placeholder' => 'introText','size'=>60,'maxlength'=>254)); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'introText'); ?>
                </div>
            </div>
        </div>

		
        <div class="form-group">
            <?php echo $form->labelEx($model, 'description', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-7">
                <?php echo $form->textArea($model, 'description', array('class' => 'form-control ckeditor', 'placeholder' => 'description')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'description'); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'image', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->fileField($model, 'image'); ?> 
                <div class="help-block">
                    <?php echo $form->error($model, 'image'); ?>
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
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ckeditor4/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ckeditor4/nilo.js"></script>