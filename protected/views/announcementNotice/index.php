<?php
/* @var $this AnnouncementNoticeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announcement Notices',
);

$this->menu=array(
	array('label'=>'Create AnnouncementNotice', 'url'=>array('create')),
	array('label'=>'Manage AnnouncementNotice', 'url'=>array('admin')),
);
?>

<h1>Announcement Notices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
