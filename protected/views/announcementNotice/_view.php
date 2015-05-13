<?php
/* @var $this AnnouncementNoticeController */
/* @var $data AnnouncementNotice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->DateCreated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->LastUpdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('announcement_id')); ?>:</b>
	<?php echo CHtml::encode($data->announcement_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('announcement_publicity_id')); ?>:</b>
	<?php echo CHtml::encode($data->announcement_publicity_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('announcement_condition_id')); ?>:</b>
	<?php echo CHtml::encode($data->announcement_condition_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_id')); ?>:</b>
	<?php echo CHtml::encode($data->users_id); ?>
	<br />


</div>