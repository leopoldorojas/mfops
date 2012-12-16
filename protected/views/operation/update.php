<?php
/* @var $this OperationController */
/* @var $model Operation */

$this->breadcrumbs=array(
	'Operations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Operation', 'url'=>array('index')),
	array('label'=>'Create Operation', 'url'=>array('create')),
	array('label'=>'View Operation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Operation', 'url'=>array('admin')),
);
?>

<h1>Update Operation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>