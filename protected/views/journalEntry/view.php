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
        array(
                'label'=>'Notas',
                'value'=>nl2br($model->notes),
                'type'=>'raw',
        ),
		// 'user_id',
		// 'createdon',
		// 'updatedon',
	),
)); ?>

<br/>
<hr/>
<h2>Movimiento al que corresponde el Asiento:</h2>

<?php 
	if ($model->operation) {
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model->operation,
			'attributes'=>array(
				'id',
				array(
					'label'=>'Número de Documento',
					'type'=>'raw',
					'value'=>CHtml::link($model->operation->document->number, array('document/view','id'=>$model->operation->document_id))
				),
				array(
					'label' => '¿Entrada o Salida?',
					'value' => CHtml::encode($model->operation->input ? "Entrada de Dinero" : "Salida de Dinero"),
				),
				array(
					'label' => '¿Caja o Bancos?',
					'value' => CHtml::encode($model->operation->bank ? "Bancos" : "Caja"),
				),
				'movement_type.description:text:Tipo',
				'operation_date',
				'amount:number:Monto',
				'entity.name:text:Entidad',
				'entity_name',
				'reference_price:number:Precio Unitario',
				'description',
				/* 'user_id',
				'createdon',
				'updatedon', */
			),
		));
	} else { ?>
		<p><b>El Asiento Contable no tiene Movimiento Asociado</b></p>
<?php
	}
?>
