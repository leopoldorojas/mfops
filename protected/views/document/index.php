<?php
/* @var $this DocumentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Documentos',
);

$this->menu=array(
	array('label'=>'Registrar Movimientos', 'url'=>array('createBatch')),
	array('label'=>'Administrar Documentos', 'url'=>array('admin')),
);
?>

<h1>Documents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
