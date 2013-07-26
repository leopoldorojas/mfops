<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Usuarios'=>array('admin'),
	$model->name,
);

$this->menu=array(
	// array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Usuario Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
		'name',
		'company.identifier:text:Empresa',
		array(
			'label'=>'Rol',
			'value' => CHtml::encode(Yii::app()->params["roles"]["$model->rol"]["label"]),
		),
	),
)); ?>
