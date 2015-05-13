<?php
/* @var $this AnnouncementVisibilityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announcement Visibilities',
);

$this->menu=array(
	array('label'=>'Create AnnouncementVisibility', 'url'=>array('create')),
	array('label'=>'Manage AnnouncementVisibility', 'url'=>array('admin')),
);
?>

<h1>Announcement Visibilities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
