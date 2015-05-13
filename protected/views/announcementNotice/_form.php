<?php
/* @var $this AnnouncementNoticeController */
/* @var $model AnnouncementNotice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'announcement-notice-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'DateCreated'); ?>
		<?php echo $form->textField($model,'DateCreated'); ?>
		<?php echo $form->error($model,'DateCreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastUpdate'); ?>
		<?php echo $form->textField($model,'LastUpdate'); ?>
		<?php echo $form->error($model,'LastUpdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'announcement_id'); ?>
		<?php echo $form->textField($model,'announcement_id'); ?>
		<?php echo $form->error($model,'announcement_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'announcement_publicity_id'); ?>
		<?php echo $form->textField($model,'announcement_publicity_id'); ?>
		<?php echo $form->error($model,'announcement_publicity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'announcement_condition_id'); ?>
		<?php echo $form->textField($model,'announcement_condition_id'); ?>
		<?php echo $form->error($model,'announcement_condition_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php echo $form->textField($model,'users_id'); ?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->