<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */

$this->breadcrumbs=array(
	'Reglas Contables'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List AccountingRule', 'url'=>array('index')),
	array('label'=>'Registrar Regla Contable', 'url'=>array('create')),
	array('label'=>'Actualizar Regla Contable', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Regla Contable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Reglas Contables', 'url'=>array('admin')),
);
?>

<h1>Regla Contable para <?php echo $model->description; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'label' => '¿Entrada o Salida?',
			'value' => CHtml::encode($model->input ? "Entrada de Dinero" : "Salida de Dinero"),
		),
		'movement_type.description:text:Tipo de Movimiento',
		array(
			'label' => '¿Caja o Bancos?',
			'value' => CHtml::encode($model->bank ? "Bancos" : "Caja"),
		),
		'description',
		'debitAccount1',
		'creditAccount1',
		// 'user_id',
	),
)); ?>

<br/>
<hr/>
<h2>Movimientos realizados de este tipo de Regla Contable:</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'operation-grid',
	'dataProvider'=>$operation->search(),
	'filter'=>$operation,
	'columns'=>array(
		'id',
		array(
			'header' => '¿Entrada o Salida?',
			'value' => '$data->input ? "Entrada" : "Salida"',
		),
		array(
			'header' => '¿Caja o Bancos?',
			'value' => '$data->bank ? "Bancos" : "Caja"',
		),
		'movement_type.description:text:Tipo',
		'operation_date',
		'amount:number:Monto',
		'entity.name:text:Entidad',
		'entity_name',
		'description',
		'journal_entry_id',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
            'viewButtonUrl' => 'array("operation/view", "id"=>$data->id)',
		),
	),
));
?>
