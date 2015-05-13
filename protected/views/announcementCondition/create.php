<?php
/* @var $this AnnouncementConditionController */
/* @var $model AnnouncementCondition */

$this->breadcrumbs=array(
	'Announcement Conditions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnnouncementCondition', 'url'=>array('index')),
	array('label'=>'Manage AnnouncementCondition', 'url'=>array('admin')),
);
?>

<h1>Create AnnouncementCondition</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>