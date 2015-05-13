<?php
/* @var $this UserDataController */
/* @var $model UserData */

$this->breadcrumbs=array(
	'User Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserData', 'url'=>array('index')),
	array('label'=>'Manage UserData', 'url'=>array('admin')),
);
?>

<h1>Create UserData</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>