<?php
/* @var $this OperationController */
/* @var $model Operation */

$this->breadcrumbs=array(
	'Movimientos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Registrar movimiento', 'url'=>array('create')),
	array('label'=>'Actualizar movimiento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar movimiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que quieres borrarlo?')),
	array('label'=>'Administrar movimientos', 'url'=>array('admin')),
);
?>

<h1>Movimiento #<?php echo $model->id; ?></h1>

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
		'user_id',
		'createdon',
		'updatedon',
	),
)); ?>
