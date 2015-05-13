<?php
/* @var $this AnnouncementConditionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announcement Conditions',
);

$this->menu=array(
	array('label'=>'Create AnnouncementCondition', 'url'=>array('create')),
	array('label'=>'Manage AnnouncementCondition', 'url'=>array('admin')),
);
?>

<h1>Announcement Conditions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
