<?php
/* @var $this AnnouncementPublicityController */
/* @var $model AnnouncementPublicity */

$this->breadcrumbs=array(
	'Announcement Publicities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AnnouncementPublicity', 'url'=>array('index')),
	array('label'=>'Create AnnouncementPublicity', 'url'=>array('create')),
	array('label'=>'Update AnnouncementPublicity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AnnouncementPublicity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnnouncementPublicity', 'url'=>array('admin')),
);
?>

<h1>View AnnouncementPublicity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'DateCreated',
		'LastUpdate',
	),
)); ?>
