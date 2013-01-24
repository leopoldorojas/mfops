<?php
/* @var $this MovementTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipos de Movimiento',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Movimiento', 'url'=>array('create')),
	array('label'=>'Administrar Tipos de Movimiento', 'url'=>array('admin')),
);
?>

<h1>Tipos de Movimiento</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
