<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'Tipos de Documento'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Documento', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Documento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Tipo de Documento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Tipos de Documento', 'url'=>array('admin')),
);
?>

<h1>Tipo de Documento Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
	),
)); ?>
