<?php
/* @var $this DocumentController */
/* @var $model Document */

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/vendors/jquery.printPage.js');

Yii::app()->clientScript->registerScript('print', "
	$('.btnPrint').printPage();
");

$this->breadcrumbs=array(
	'Documentos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Registrar Documento', 'url'=>array('createRestfulBatch')),
	// array('label'=>'Actualizar Documento', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Borrar Documento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Consultar Documentos', 'url'=>array('admin')),
);
?>

<h1>Número de Documento: <?php echo $model->number; ?></h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'document_type.description:text:Tipo de Documento',
		'number',
		'document_date',
		'entity.name:text:Entidad',
		'entity_name',
		'description',
	),
)); 
?>

<br/>
<hr/>
<h2>Movimientos del Documento:</h2>

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

<p></p>
<p><b>Si deseas imprimir el documento, por favor haz click en el siguiente enlace:</b><br />
<a class="btnPrint" href='<?php echo $this->createUrl("document/print/$model->id"); ?>'>IMPRIMIR</a></p>
