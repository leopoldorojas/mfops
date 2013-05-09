<?php
/* @var $this MovementTypeController */
/* @var $model MovementType */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Tipos de Movimiento'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	// array('label'=>'Listar Tipos de Movimiento', 'url'=>array('index')),
	array('label'=>'Crear Tipos de Movimiento', 'url'=>array('create')),
	// array('label'=>'Ver Tipo de Movimiento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipos de Movimiento', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Movimiento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>