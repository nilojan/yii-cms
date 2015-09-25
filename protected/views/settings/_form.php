<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="horizontal-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articles-form',
	'htmlOptions' => array('class' => 'form-horizontal','role' => 'form'),
	'enableAjaxValidation'=>false,
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
            <?php echo $form->labelEx($model, 'param', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'param', array('class' => 'form-control', 'disabled' => 'disabled')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'param'); ?>
                </div>
            </div>
        </div>


		<div class="form-group">
            <?php echo $form->labelEx($model, 'val', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php $Page = Page::model()->findAll("t.status=1");
			$data = CHtml::listData($Page,'id','title');
			 echo $form->dropDownList($model,'val',$data,array('class' => 'form-control')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'val'); ?>
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