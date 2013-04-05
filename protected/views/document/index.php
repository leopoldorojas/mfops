<?php
/* @var $this DocumentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Documentos',
);

$this->menu=array(
	array('label'=>'Registrar Documento', 'url'=>array('createRestfulBatch')),
	array('label'=>'Consultar Documentos', 'url'=>array('admin')),
);
?>

<h1>Documentos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
