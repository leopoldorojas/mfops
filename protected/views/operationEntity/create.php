<?php
/* @var $this OperationEntityController */
/* @var $model OperationEntity */

$this->breadcrumbs=array(
	'Entidades de Operación'=>array('admin'),
	'Crear',
);

$this->menu=array(
	// array('label'=>'List OperationEntity', 'url'=>array('index')),
	array('label'=>'Administrar Entidades de Operación', 'url'=>array('admin')),
);
?>

<h1>Crear Entidad de Operación</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>