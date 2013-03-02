<?php
/* @var $this OperationController */
/* @var $model Operation */

$this->breadcrumbs=array(
	'Movimientos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Registrar movimiento', 'url'=>array('create')),
	array('label'=>'Actualizar movimiento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar movimiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar movimientos', 'url'=>array('admin')),
);
?>

<h1>Movimiento Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'input',
		'bank',
		'type_id',
		'operation_date',
		'amount',
		'entity_id',
		'entity_name',
		'reference_price',
		'description',
		'document_id',
		/* 'user_id',
		'createdon',
		'updatedon', */
	),
)); ?>
