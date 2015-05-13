<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Create Users</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'model1'=>$model1, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4,), false, TRUE); ?>