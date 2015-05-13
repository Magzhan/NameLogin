<?php
/* @var $this AnnouncementPublicityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announcement Publicities',
);

$this->menu=array(
	array('label'=>'Create AnnouncementPublicity', 'url'=>array('create')),
	array('label'=>'Manage AnnouncementPublicity', 'url'=>array('admin')),
);
?>

<h1>Announcement Publicities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
