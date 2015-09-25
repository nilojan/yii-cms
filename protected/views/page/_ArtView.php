<?php
/* @var $this ArticlesController */
/* @var $data Articles */
?>

<div class="view artcls">
<div class="media">
  <div class="media-left">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/articles/view/id/<?php echo $data->id; ?>">
      <img class="media-object" src="<?php echo Yii::app()->request->baseUrl; ?>/images/articles/400/<?php echo CHtml::encode($data->image); ?>" alt="<?php echo CHtml::encode($data->title); ?>" style="width: 64px; height: 64px;">
    </a>
  </div>
  <div class="media-body">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/articles/view/id/<?php echo $data->id; ?>">
		<h4 class="media-heading"><?php echo CHtml::encode($data->title); ?></h4>
	</a>
    <?php echo CHtml::encode($data->introText); ?>
  </div>
</div>
</div>