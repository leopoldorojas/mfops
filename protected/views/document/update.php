<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documentos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar Documentos',
);

$this->menu=array(
	// array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Registrar Documento', 'url'=>array('createRestfulBatch')),
	array('label'=>'Ver Documento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Documentos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Documento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>