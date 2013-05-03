<?php
/* @var $this OperationController */
/* @var $model Operation */

$this->breadcrumbs=array(
	'Movimientos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'Listar Movimientos', 'url'=>array('index')),
	//array('label'=>'Registrar movimiento', 'url'=>array('create')),
	//array('label'=>'Actualizar movimiento', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Borrar movimiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Consultar movimientos', 'url'=>array('admin')),
);
?>

<h1>Movimiento Id <?php echo $model->id; ?> del Documento <?php echo $model->document_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'document.number:text:Número de Documento',
		array(
			'label' => '¿Entrada o Salida?',
			'value' => CHtml::encode($model->input ? "Entrada" : "Salida"),
		),
		array(
			'label' => '¿Caja o Bancos?',
			'value' => CHtml::encode($model->bank ? "Bancos" : "Caja"),
		),
		'movement_type.description:text:Tipo',
		'operation_date',
		'amount:number:Monto',
		'entity.name:text:Entidad',
		'entity_name',
		'reference_price',
		'description',
		/* 'user_id',
		'createdon',
		'updatedon', */
	),
)); ?>

<br/>
<hr/>
<h2>Asiento Contable del Movimiento:</h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->journalEntry,
	'attributes'=>array(
		'id',
		'debitAccount',
		'debitAmount:number:Monto Debitado',
		'creditAccount',
		'creditAmount:number:Monto Acreditado',
		// 'branchID',
		'journalEntry_date',
		'notes',
		// 'user_id',
		// 'createdon',
		// 'updatedon',
	),
)); ?>
