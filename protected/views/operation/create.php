<?php
/* @var $this OperationController */
/* @var $model Operation */

$this->breadcrumbs=array(
	'Movimientos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Administrar movimientos', 'url'=>array('admin')),
);
?>

<h1>Registrar movimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>