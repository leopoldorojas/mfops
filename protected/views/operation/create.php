<?php
/* @var $this OperationController */
/* @var $model Operation */

$this->breadcrumbs=array(
	'Operations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Operation', 'url'=>array('index')),
	array('label'=>'Manage Operation', 'url'=>array('admin')),
);
?>

<h1>Create Operation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>