<?php
/* @var $this AnnouncementController */
/* @var $model Announcement */

$this->breadcrumbs=array(
	'Announcements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Announcement', 'url'=>array('index')),
	array('label'=>'Create Announcement', 'url'=>array('create')),
	array('label'=>'View Announcement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Announcement', 'url'=>array('admin')),
);
?>

<h1>Update Announcement <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'model1'=>$model1, 'model3'=>$model3, 'model10'=>$model10)); ?>