<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */

$this->breadcrumbs=array(
	'Categorías de Movimientos'=>array('admin'),
	'Crear',
);

$this->menu=array(
	// array('label'=>'Listar Categorías', 'url'=>array('index')),
	array('label'=>'Administrar Categorías', 'url'=>array('admin')),
);
?>

<h1>Crear Categoría de Movimientos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>