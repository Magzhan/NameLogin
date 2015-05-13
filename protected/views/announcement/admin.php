<?php
/* @var $this AnnouncementController */
/* @var $model Announcement */

$this->breadcrumbs=array(
	'Announcements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Announcement', 'url'=>array('index')),
	array('label'=>'Create Announcement', 'url'=>array('create')),
	array('label'=>'Posted Announcement', 'url'=>array('postedAnnouncements')),
	array('label'=>'Waiting Announcement', 'url'=>array('waitingAnnouncements')),
	array('label'=>'Rejected Announcement', 'url'=>array('rejectedAnnouncements')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#announcement-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

");
?>

<h1>Manage Announcements</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<br/>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'announcement-grid',
	'dataProvider'=>$model,
	//'filter'=>$model,
	'columns'=>array(
		'subject',
		'content',
		'users_id',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{approove}{reject}',
			'buttons'=>array(
				'approove'=>array(
				),
				'reject'=>array(
					
				), 
			),
		),
	),
)); ?>
