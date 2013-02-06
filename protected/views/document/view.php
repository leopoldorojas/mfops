<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documentos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Registrar Movimientos', 'url'=>array('create')),
	array('label'=>'Actualizar Documento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Documento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que deseas borrarlo?')),
	array('label'=>'Administrar Documentos', 'url'=>array('admin')),
);
?>

<h1>View Document #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'documentType_id',
		'number',
		'document_date',
		'entity_id',
		'entity_name',
		'description',
	),
)); ?>
