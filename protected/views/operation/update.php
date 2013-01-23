<?php
/* @var $this OperationController */
/* @var $model Operation */

$this->breadcrumbs=array(
	'Movimientos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar movimientos', 'url'=>array('index')),
	array('label'=>'Registrar movimiento', 'url'=>array('create')),
	array('label'=>'Ver movimiento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar movimientos', 'url'=>array('admin')),
);
?>

<h1>Actualizar movimiento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>