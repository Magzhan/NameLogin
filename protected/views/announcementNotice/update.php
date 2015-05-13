<?php
/* @var $this AnnouncementNoticeController */
/* @var $model AnnouncementNotice */

$this->breadcrumbs=array(
	'Announcement Notices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnouncementNotice', 'url'=>array('index')),
	array('label'=>'Create AnnouncementNotice', 'url'=>array('create')),
	array('label'=>'View AnnouncementNotice', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AnnouncementNotice', 'url'=>array('admin')),
);
?>

<h1>Update AnnouncementNotice <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>