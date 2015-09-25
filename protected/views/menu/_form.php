<?php
/* @var $this MenuController */
/* @var $model Menu */
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
            <?php echo $form->labelEx($model, 'Title', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'Title', array('class' => 'form-control', 'placeholder' => 'Title','size'=>60,'maxlength'=>254)); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'Title'); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'shortText', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'shortText', array('class' => 'form-control', 'placeholder' => 'shortText','size'=>60,'style'=>'text-transform: lowercase;')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'shortText'); ?>
                </div>
            </div>
        </div>



        <div class="form-group">
            <?php echo $form->labelEx($model, 'page_id', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php $Page = Page::model()->findAll("t.status=1");
			$data = CHtml::listData($Page,'id','title');
			 echo $form->dropDownList($model,'page_id',$data,array('class' => 'form-control')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'page_id'); ?>
                </div>
            </div>
        </div>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'level', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->dropDownList($model, 'level', array('1' => '1st Level',
                                                                '2' => '2nd Level',) , 
											array('class' => 'form-control','options' => array('M' => array('selected' => true)))); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'level'); ?>
                </div>
            </div>
        </div>



        <div class="form-group hide" id="menuid">
            <?php echo $form->labelEx($model, 'parent_id', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
               <?php $Menu = Menu::model()->findAll("t.status=1 AND t.parent_id=0");
			$data = CHtml::listData($Menu,'id','Title');
			 echo $form->dropDownList($model,'parent_id',$data,array('empty' => 'Select a Page','class' => 'form-control')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'parent_id'); ?>
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
<script>
$("#Menu_level").change(function(){	
	 var Menu_level = $(this).val();
	 if(Menu_level==2){
	 	$('#menuid').addClass('show').removeClass('hide');
		$("#Menu_parent_id").prop("required", true);		
	 }else{
		$('#menuid').addClass('hide').removeClass('show');
		$("#Menu_parent_id").prop("required", false);		
	 }	 
});
</script>