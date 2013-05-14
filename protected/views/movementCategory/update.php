<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Categorías de Movimientos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	// array('label'=>'Listar Categorías', 'url'=>array('index')),
	array('label'=>'Crear Categoría', 'url'=>array('create')),
	// array('label'=>'Ver Categoría', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Categorías', 'url'=>array('admin')),
);
?>

<h1>Actualizar Categoría de Movimientos Id <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>