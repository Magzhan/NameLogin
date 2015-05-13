<?php
/* @var $this AnnouncementCommentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announcement Comments',
);

$this->menu=array(
	array('label'=>'Create AnnouncementComments', 'url'=>array('create')),
	array('label'=>'Manage AnnouncementComments', 'url'=>array('admin')),
);
?>

<h1>Announcement Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
