<?php
/* @var $this AnnouncementVisibilityController */
/* @var $model AnnouncementVisibility */

$this->breadcrumbs=array(
	'Announcement Visibilities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnouncementVisibility', 'url'=>array('index')),
	array('label'=>'Create AnnouncementVisibility', 'url'=>array('create')),
	array('label'=>'View AnnouncementVisibility', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AnnouncementVisibility', 'url'=>array('admin')),
);
?>

<h1>Update AnnouncementVisibility <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>