<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documentos'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Consultar Documentos', 'url'=>array('admin')),
);
?>

<h1>Registrar Documento</h1>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	));
?>