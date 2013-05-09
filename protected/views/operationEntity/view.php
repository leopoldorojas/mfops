<?php
/* @var $this OperationEntityController */
/* @var $model OperationEntity */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Entidades de Operación'=>array('admin'),
	$model->name,
);

$this->menu=array(
	// array('label'=>'List OperationEntity', 'url'=>array('index')),
	array('label'=>'Crear Entidad de Operación', 'url'=>array('create')),
	array('label'=>'Actualizar Entidad de Operación', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Entidad de Operación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Entidades de Operación', 'url'=>array('admin')),
);
?>

<h1>Ver Entidad de Operación Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
	),
)); ?>
