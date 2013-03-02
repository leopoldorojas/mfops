<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */

$this->breadcrumbs=array(
	'Asientos Diarios'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List JournalEntry', 'url'=>array('index')),
	array('label'=>'Registrar Asiento Diario', 'url'=>array('create')),
	array('label'=>'Actualizar Asiento Diario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Asiento Diario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Asientos Diarios', 'url'=>array('admin')),
);
?>

<h1>Asiento Diario Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'debitAccount',
		'debitAmount',
		'creditAccount',
		'creditAmount',
		'branchID',
		'journalEntry_date',
		'notes',
		// 'user_id',
		// 'createdon',
		// 'updatedon',
	),
)); ?>
