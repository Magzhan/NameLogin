<?php
/* @var $this AnnouncementPublicityController */
/* @var $model AnnouncementPublicity */

$this->breadcrumbs=array(
	'Announcement Publicities'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnouncementPublicity', 'url'=>array('index')),
	array('label'=>'Create AnnouncementPublicity', 'url'=>array('create')),
	array('label'=>'View AnnouncementPublicity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AnnouncementPublicity', 'url'=>array('admin')),
);
?>

<h1>Update AnnouncementPublicity <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>