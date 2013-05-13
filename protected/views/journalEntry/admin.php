<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */

$this->breadcrumbs=array(
	'Asientos Diarios'=>array('admin'),
	'Consultar',
);

$this->menu=array(
	// array('label'=>'List JournalEntry', 'url'=>array('index')),
	// array('label'=>'Registrar Asiento Diario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('journal-entry-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Consultar Asientos Diarios</h1>

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
	'id'=>'journal-entry-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'debitAccount',
		'debitAmount:number:Monto Debitado',
		'creditAccount',
		'creditAmount:number:Monto Acreditado',
		//'branchID',
		'journalEntry_date',
		array(
			'name' => 'operation.document.number',
			'filter'=>CHtml::activeTextField($model,'documentNumber'),
		),
		//'notes',
		/*
		'user_id',
		'createdon',
		'updatedon',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
