<?php
/* @var $this AnnouncementNoticeController */
/* @var $model AnnouncementNotice */

$this->breadcrumbs=array(
	'Announcement Notices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnnouncementNotice', 'url'=>array('index')),
	array('label'=>'Manage AnnouncementNotice', 'url'=>array('admin')),
);
?>

<h1>Create AnnouncementNotice</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>