<?php
/* @var $this DocumentController */
/* @var $model Document */

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/vendors/jquery.printPage.js');

Yii::app()->clientScript->registerScript('print', "
	$('.btnPrint').printPage();
");
?>

<h3>Número de Documento: <?php echo $model->number; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'document_type.description:text:Tipo de Documento',
		'number',
		'document_date',
		'totalAmount:number:Monto Total',
		'entity.name:text:Entidad',
		'entity_name',
		'description',
	),
)); 
?>

<h3>Movimientos del Documento:</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'operation-grid',
	'dataProvider'=>$operation->search(),
	'summaryText'=>false,
	'columns'=>array(
		array(
			'name'=>'id',
			'sortable'=>false,
		),
		array(
			'header' => '¿Entrada o Salida?',
			'value' => '$data->input ? "Entrada" : "Salida"',
		),
		array(
			'header' => '¿Caja o Bancos?',
			'value' => '$data->bank ? "Bancos" : "Caja"',
		),
		array(
			'header'=>'Tipo',
			'value'=>'$data->movement_type ? $data->movement_type->description : ""',
		),
		array(
			'name'=>'operation_date',
			'sortable'=>false,
		),
		array(
			'name'=>'amount',
			'type'=>'number',
			'sortable'=>false,
		),
		array(
			'header'=>'Entidad',
			'value'=>'$data->entity ? $data->entity->name : ""',
		),
		array(
			'name'=>'entity_name',
			'sortable'=>false,
		),
		array(
			'name'=>'description',
			'sortable'=>false,
		),
		array(
			'name'=>'journal_entry_id',
			'sortable'=>false,
		),
	),
));
?>
