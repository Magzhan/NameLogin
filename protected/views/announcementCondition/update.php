<?php
/* @var $this AnnouncementConditionController */
/* @var $model AnnouncementCondition */

$this->breadcrumbs=array(
	'Announcement Conditions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnouncementCondition', 'url'=>array('index')),
	array('label'=>'Create AnnouncementCondition', 'url'=>array('create')),
	array('label'=>'View AnnouncementCondition', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AnnouncementCondition', 'url'=>array('admin')),
);
?>

<h1>Update AnnouncementCondition <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>