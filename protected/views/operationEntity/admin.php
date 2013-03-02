<?php
/* @var $this OperationEntityController */
/* @var $model OperationEntity */

$this->breadcrumbs=array(
	'Entidades de Operación'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	// array('label'=>'Listar Entidades de Operación', 'url'=>array('index')),
	array('label'=>'Crear Entidad de Operación', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('operation-entity-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Entidades de Operación</h1>

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
	'id'=>'operation-entity-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'code',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
