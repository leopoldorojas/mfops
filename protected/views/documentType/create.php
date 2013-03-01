<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'Tipos de Documento'=>array('admin'),
	'Crear',
);

$this->menu=array(
	// array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'Administrar Tipos de Documento', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de Documento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>