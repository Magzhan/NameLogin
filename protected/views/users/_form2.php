<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<script>
function showDepartment(faculty_id){

	}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
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
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'roles_id'); ?>
		<?php echo $form->dropDownList(
						$model,
						'roles_id',
						CHtml::listData(
								Roles::model()->findAll(),
								'id',
								'description'
						),
						array(
								'class'=>'my-drop-down',
										
						)
		); ?>
		<?php echo $form->error($model,'roles_id'); ?>
	</div>
    
	<div class="row">
    	<?php echo $form->labelEx($model4,'Faculty'); ?>
		<?php echo $form->dropDownList(
					$model4,
					'faculty_id',
					//'',
					CHtml::listData(
							Faculty::model()->findAll(),
							'id',
							'name'
					),
					array(
							'class'=>'my-drop-down',
							'ajax'=>array(
								'type'=>'POST',
								'url'=>CController::createUrl('users/changeSub'),
								'update'=>'#UserData_department_id',
								'data'=>array(
									'faculty_id'=>'js:this.value',
								))
					)
		); ?>
	</div>
    
    <div class="row" id="department_here">
    	<?php echo $form->labelEx($model4,'Department'); ?>
		<?php echo $form->dropDownList(
						$model4,
						'department_id',
						CHtml::listData(Department::model()->findAllByAttributes(array('faculty_id' =>$model4->faculty_id)), 'id', 'name'),
						array(
								'class'=>'my-drop-down',
								'options'=>array($model4->department_id=>array('selected'=>"selected")),
								'ajax'=>array(
									'type'=>'POST',
									'url'=>CController::createUrl('users/changeGroup'),
									'update'=>'#UserData_group_id',
									'data'=>array(
										'department_id'=>'js:this.value',
									)
								)
						)
		); 
		?>
	</div>

	<div class="row">
    	<?php echo $form->labelEx($model4,'Group'); ?>
		<?php echo $form->dropDownList($model4,
									'group_id',
									CHtml::listData(Group::model()->findAllByAttributes(array('department_id'=>$model4->department_id)), 'id', 'name'),
									array(
										'class'=>'my-drop-down',
										'options'=>array($model4->group_id=>array('selected'=>"selected"))
									));  ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->