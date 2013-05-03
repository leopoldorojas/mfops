<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */

$this->breadcrumbs=array(
	'Asientos Diarios'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List JournalEntry', 'url'=>array('index')),
	//array('label'=>'Registrar Asiento Diario', 'url'=>array('create')),
	//array('label'=>'Actualizar Asiento Diario', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Borrar Asiento Diario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Consultar Asientos', 'url'=>array('admin')),
);
?>

<h1>Asiento Diario Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'debitAccount',
		'debitAmount:number:Monto Debitado',
		'creditAccount',
		'creditAmount:number:Monto Acreditado',
		//'branchID',
		'journalEntry_date',
		'notes',
		// 'user_id',
		// 'createdon',
		// 'updatedon',
	),
)); ?>

<br/>
<hr/>
<h2>Movimiento al que corresponde el Asiento:</h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->operation,
	'attributes'=>array(
		'id',
		'input',
		'bank',
		'type_id',
		'operation_date',
		'amount:number:Monto',
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
