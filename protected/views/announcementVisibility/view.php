<?php
/* @var $this AnnouncementVisibilityController */
/* @var $model AnnouncementVisibility */

$this->breadcrumbs=array(
	'Announcement Visibilities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AnnouncementVisibility', 'url'=>array('index')),
	array('label'=>'Create AnnouncementVisibility', 'url'=>array('create')),
	array('label'=>'Update AnnouncementVisibility', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AnnouncementVisibility', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnnouncementVisibility', 'url'=>array('admin')),
);
?>

<h1>View AnnouncementVisibility #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'announcement_id',
		'group_id',
	),
)); ?>
