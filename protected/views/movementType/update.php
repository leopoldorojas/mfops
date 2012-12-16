<?php
/* @var $this MovementTypeController */
/* @var $model MovementType */

$this->breadcrumbs=array(
	'Movement Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MovementType', 'url'=>array('index')),
	array('label'=>'Create MovementType', 'url'=>array('create')),
	array('label'=>'View MovementType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MovementType', 'url'=>array('admin')),
);
?>

<h1>Update MovementType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>