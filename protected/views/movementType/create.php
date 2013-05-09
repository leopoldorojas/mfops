<?php
/* @var $this MovementTypeController */
/* @var $model MovementType */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Tipos de Movimiento'=>array('admin'),
	'Crear',
);

$this->menu=array(
	// array('label'=>'Listar Tipos de Movimiento', 'url'=>array('index')),
	array('label'=>'Administrar Tipos de Movimiento', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de Movimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>