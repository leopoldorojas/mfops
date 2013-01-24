<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */

$this->breadcrumbs=array(
	'Categorías de Movimientos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Categorías', 'url'=>array('index')),
	array('label'=>'Crear Categoría', 'url'=>array('create')),
	array('label'=>'Actualizar Categoría', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Categoría', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea borrarla?')),
	array('label'=>'Administrar Categorías', 'url'=>array('admin')),
);
?>

<h1>Categoría de Movimiento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'user_id',
		'createdon',
		'updatedon',
	),
)); ?>
