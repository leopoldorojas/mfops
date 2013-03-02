<?php
/* @var $this OperationEntityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entidades de Operación',
);

$this->menu=array(
	array('label'=>'Crear Entidad de Operación', 'url'=>array('create')),
	array('label'=>'Administrar Entidades de Operación', 'url'=>array('admin')),
);
?>

<h1>Entidades de Operación</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
