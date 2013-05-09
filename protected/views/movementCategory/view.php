<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Categorías de Movimientos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'Listar Categorías', 'url'=>array('index')),
	array('label'=>'Crear Categoría', 'url'=>array('create')),
	array('label'=>'Actualizar Categoría', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Categoría', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Categorías', 'url'=>array('admin')),
);
?>

<h1>Categoría de <?php echo $model->description; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
	),
)); ?>

<br/>
<hr/>
<h2>Tipos de Movimiento de esta Categoría:</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'movement-type-grid',
	'dataProvider'=>$movementType->search(),
	'filter'=>$movementType,
	'columns'=>array(
		'id',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>