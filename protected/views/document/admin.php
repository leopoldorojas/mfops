<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documentos'=>array('admin'),
	'Consultar',
);

$this->menu=array(
	// array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Registrar Documento', 'url'=>array('createRestfulBatch')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#document-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Consultar Documentos</h1>

<p>
Opcionalmente puedes usar un operador de comparación como (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al inicio de cada valor de búsqueda, para especificar cómo realizar la comparación.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'document-grid',
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
			'header'=>'Tipo de Documento',
			'value'=>'$data->document_type ? $data->document_type->description : ""',
			'filter' => CHtml::activeDropDownList($model,'documentType_id',
				CHtml::listData(DocumentType::model()->findAll(), 'id', 'description'), array('empty'=>'--')),
		),
		'number',
		'document_date',
		array(
			'header'=>'Entidad',
			'value'=>'$data->entity ? $data->entity->name : ""',
			'filter' => CHtml::activeDropDownList($model,'entity_id',
				CHtml::listData(OperationEntity::model()->findAll(), 'id', 'name'), array('empty'=>'--')),
		),
		'entity_name',
		array(
			'name' => 'totalAmount',
			'filter' => false,
		),
		//'description',
		// 'user_id',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
