<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'Tipos de Documento'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	// array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Documento', 'url'=>array('create')),
	array('label'=>'Ver Tipo de Documento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipos de Documento', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tipo de Documento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>