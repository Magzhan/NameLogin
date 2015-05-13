<?php
/* @var $this AnnouncementCommentsController */
/* @var $model AnnouncementComments */

$this->breadcrumbs=array(
	'Announcement Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnnouncementComments', 'url'=>array('index')),
	array('label'=>'Manage AnnouncementComments', 'url'=>array('admin')),
);
?>

<h1>Create AnnouncementComments</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>