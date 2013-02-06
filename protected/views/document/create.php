<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documentos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Administrar Documentos', 'url'=>array('admin')),
);
?>

<h1>Registrar Movimientos</h1>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'operations'=>$operations,
	)); ?>