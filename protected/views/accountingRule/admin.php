<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */

$this->breadcrumbs=array(
	'Reglas Contables'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	// array('label'=>'List AccountingRule', 'url'=>array('index')),
	array('label'=>'Registrar Regla Contable', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('accounting-rule-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Reglas Contables</h1>

<p>
Opcionalmente puedes usar un operador de comparación como (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al inicio de cada valor de búsqueda, para especificar cómo realizar la comparación.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accounting-rule-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'emptyText' => 'No hay ningún registro para mostrar',
    'summaryText' => 'Mostrando {start}-{end} de {count} registro(s).',
    'pager'=>array(
        'header'         => 'Ir a página:',
        'prevPageLabel'  => '< Previa',
        'nextPageLabel'  => 'Próxima >',
    ),
	'columns'=>array(
		'id',
		array(
			'header' => '¿Entrada o Salida?',
			'value' => '$data->input ? "Entrada" : "Salida"',
			'filter' => CHtml::activeDropDownList($model,'input',
				array(true=>'Entrada de dinero', false=>'Salida de dinero'), array('empty'=>'--'))
		),
		array(
			'header' => '¿Caja o Bancos?',
			'value' => '$data->bank ? "Bancos" : "Caja"',
			'filter' => CHtml::activeDropDownList($model,'bank',
				array(true=>'Bancos', false=>'Caja'), array('empty'=>'--'))
		),
		array(
			'header'=>'Tipo',
			'value'=>'$data->movement_type ? $data->movement_type->description : ""',
			'filter' => CHtml::activeDropDownList($model,'type_id',
				CHtml::listData(MovementType::model()->findAll(), 'id', 'description'), array('empty'=>'--')),
		),
		'description',
		'debitAccount1',
		'creditAccount1',
		// 'user_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
