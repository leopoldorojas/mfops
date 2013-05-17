<?php
/* @var $this MovementTypeController */
/* @var $model MovementType */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Tipos de Movimiento'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	// array('label'=>'Listar Tipos de Movimiento', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Movimiento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('movement-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tipos de Movimiento</h1>

<?php /* <p>
Opcionalmente puedes usar un operador de comparación como (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al inicio de cada valor de búsqueda, para especificar cómo realizar la comparación.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --> */ ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'movement-type-grid',
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
		'description',
		array(
			'header'=>'¿Utiliza Precio de Referencia?',
			'value'=>'$data->with_price ? "Sí" : "No"',
			'filter' => CHtml::activeDropDownList($model,'with_price',
				array(true=>'Sí', false=>'No'), array('empty'=>'--')),
			'visible'=> Yii::app()->user->name == 'admin',
		),
		array(
			'header'=>'Categoría de Movimiento',
			'value'=>'$data->movement_category ? $data->movement_category->description : ""',
			'filter' => CHtml::activeDropDownList($model,'movement_category_id',
				CHtml::listData(MovementCategory::model()->findAll(), 'id', 'description'), array('empty'=>'--')),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>
