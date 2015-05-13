<?php
/* @var $this AnnouncementPublicityController */
/* @var $model AnnouncementPublicity */

$this->breadcrumbs=array(
	'Announcement Publicities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnnouncementPublicity', 'url'=>array('index')),
	array('label'=>'Manage AnnouncementPublicity', 'url'=>array('admin')),
);
?>

<h1>Create AnnouncementPublicity</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>