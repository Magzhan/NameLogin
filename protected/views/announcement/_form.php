<?php
/* @var $this AnnouncementController */
/* @var $model Announcement */
/* @var $form CActiveForm */
?>
<script>
function menuChange(val){
	if(val == 1 || val == 3){
			$("#selected").hide();
		}
	else{
			$("#selected").show();
		}
	}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'announcement-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array(
			'enctype'=>'multipart/form-data',
	),
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model1,'announcement_publicity_id'); ?>
		<?php //echo $form->radioButtonList($model1,'announcement_publicity_id',array('value'=>1, 'id'=>'btn1','uncheckValue'=>0, 'onclick'=>'js:$("#selected").hide();')); ?>
		<?php //echo $form->error($model,'subject'); ?>
	<!-- </div> -->
	
    <?php echo $form->radioButtonList($model1,'announcement_publicity_id', CHtml::listData(AnnouncementPublicity::model()->findAll(), 'id', 'name'), array('onchange'=>'menuChange(this.value);')); ?>
    
    <!-- <div class="row"> -->
		<?php //echo $form->labelEx($model1,'announcement_publicity_id'); ?>
		<?php //echo $form->radioButton($model1,'announcement_publicity_id',array('value'=>2, 'id'=>'btn2','uncheckValue'=>0, 'onclick'=>'js:$("#selected").show();')); ?>
		<?php //echo $form->error($model,'subject'); ?>
	<!-- </div> -->
	
    <!-- <div class="row"> -->
		<?php //echo $form->labelEx($model1,'announcement_publicity_id'); ?>
		<?php //echo $form->radioButton($model1,'announcement_publicity_id',array('value'=>3, 'id'=>'btn3', 'uncheckValue'=>0, 'onclick'=>'js:$("#selected").hide();')); ?>
		<?php //echo $form->error($model,'subject'); ?>
	</div>
	
    <div class="row" id="selected">
    	<?php echo '<ul>'; ?>
    	<?php foreach($model3 as $faculty): ?>
        <?php echo CHtml::checkBox($faculty->id, true, array())." ".$faculty->name; ?>
        <?php echo '<ul>'; ?>
        <?php foreach(Department::model()->findAllByAttributes(array('faculty_id'=>$faculty->id)) as $department): ?>
        <?php echo CHtml::checkBox($faculty->id.$department->id, true, array())." ".$department->name; ?>
        <?php echo '<ul>';?>
        <?php //foreach(Group::model()->findAllByAttributes(array('department_id'=>$department->id)) as $group): ?>
        <?php echo CHtml::checkBoxList('AnnouncementVisibility[group_id][]', true, CHtml::listData(Group::model()->findAllByAttributes(array('department_id'=>$department->id)), 'id', 'name'), array('multiple'=>true)); ?>
        <?php //endforeach; ?>
        <?php echo '</ul>'; ?>
        <?php endforeach; ?>
        <?php echo '</ul>'; ?>
        <?php endforeach; ?>
        <?php echo '</ul>'; ?>
    </div>
    
    <div class="row">
		<?php echo $form->labelEx($model10,'Submit?'); ?>
		<?php echo CHtml::checkBox('Faculty[name][]',false ,array('value'=>99,'uncheckValue'=>NULL)); ?>
		<?php //echo $form->error($model2,'announcement_id'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->