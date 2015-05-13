<?php
/* @var $this AnnouncementConditionController */
/* @var $model AnnouncementCondition */

$this->breadcrumbs=array(
	'Announcement Conditions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AnnouncementCondition', 'url'=>array('index')),
	array('label'=>'Create AnnouncementCondition', 'url'=>array('create')),
	array('label'=>'Update AnnouncementCondition', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AnnouncementCondition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnnouncementCondition', 'url'=>array('admin')),
);
?>

<h1>View AnnouncementCondition #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'DateCreated',
		'LastUpdate',
	),
)); ?>
