<?php
/* @var $this MovementCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Categorías de Movimientos',
);

$this->menu=array(
	array('label'=>'Crear Categoría', 'url'=>array('create')),
	array('label'=>'Administrar Categorías', 'url'=>array('admin')),
);
?>

<h1>Categorías de Movimientos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
