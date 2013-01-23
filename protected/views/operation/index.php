<?php
/* @var $this OperationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Movimientos',
);

$this->menu=array(
	array('label'=>'Registrar movimiento', 'url'=>array('create')),
	array('label'=>'Administrar movimientos', 'url'=>array('admin')),
);
?>

<h1>Movimientos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
