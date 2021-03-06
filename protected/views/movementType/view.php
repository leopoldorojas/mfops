<?php
/* @var $this MovementTypeController */
/* @var $model MovementType */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Tipos de Movimiento'=>array('admin'),
	$model->id,
);

$this->menu=array(
	///array('label'=>'Listar Tipos de Movimiento', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Movimiento', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Movimiento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Tipo de Movimiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Tipos de Movimiento', 'url'=>array('admin')),
);
?>

<h1>Tipo de Movimiento Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'movement_category.description:text:Categoría de Movimiento',
		'description',
		array(
			'label'=>'¿Utiliza Precio de Referencia?',
			'value' => CHtml::encode($model->with_price ? "Sí" : "No"),
			'visible'=> Yii::app()->user->name == 'admin',
		),
	),
)); ?>
