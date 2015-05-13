<?php
/* @var $this AnnouncementNoticeController */
/* @var $model AnnouncementNotice */

$this->breadcrumbs=array(
	'Announcement Notices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AnnouncementNotice', 'url'=>array('index')),
	array('label'=>'Create AnnouncementNotice', 'url'=>array('create')),
	array('label'=>'Update AnnouncementNotice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AnnouncementNotice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnnouncementNotice', 'url'=>array('admin')),
);
?>

<h1>View AnnouncementNotice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'DateCreated',
		'LastUpdate',
		'announcement_id',
		'announcement_publicity_id',
		'announcement_condition_id',
		'users_id',
	),
)); ?>
