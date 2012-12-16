<?php
/* @var $this MovementTypeController */
/* @var $model MovementType */

$this->breadcrumbs=array(
	'Movement Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MovementType', 'url'=>array('index')),
	array('label'=>'Manage MovementType', 'url'=>array('admin')),
);
?>

<h1>Create MovementType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>