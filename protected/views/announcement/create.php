<?php
/* @var $this AnnouncementController */
/* @var $model Announcement */

$this->breadcrumbs=array(
	'Announcements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Announcement', 'url'=>array('index')),
	array('label'=>'Manage Announcement', 'url'=>array('admin')),
);
?>
<script>

</script>

<h1>Create Announcement</h1>
<?php $this->renderPartial('_form', array('model'=>$model, 'model1'=>$model1, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4, 'model5'=>$model5, 'model10'=>$model10), false, true); ?>