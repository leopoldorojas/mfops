<?php
/* @var $this OperationEntityController */
/* @var $model OperationEntity */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Entidades de Operación'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	// array('label'=>'List OperationEntity', 'url'=>array('index')),
	array('label'=>'Crear Entidad de Operación', 'url'=>array('create')),
	// array('label'=>'Ver Entidad de Operación', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Entidades de Operación', 'url'=>array('admin')),
);
?>

<h1>Actualizar Entidad de Operación <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>