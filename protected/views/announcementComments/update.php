<?php
/* @var $this AnnouncementCommentsController */
/* @var $model AnnouncementComments */

$this->breadcrumbs=array(
	'Announcement Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnouncementComments', 'url'=>array('index')),
	array('label'=>'Create AnnouncementComments', 'url'=>array('create')),
	array('label'=>'View AnnouncementComments', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AnnouncementComments', 'url'=>array('admin')),
);
?>

<h1>Update AnnouncementComments <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>