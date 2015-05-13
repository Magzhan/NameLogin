<?php
/* @var $this AnnouncementVisibilityController */
/* @var $model AnnouncementVisibility */

$this->breadcrumbs=array(
	'Announcement Visibilities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnnouncementVisibility', 'url'=>array('index')),
	array('label'=>'Manage AnnouncementVisibility', 'url'=>array('admin')),
);
?>

<h1>Create AnnouncementVisibility</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>