<?php
/* @var $this DocumentTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Tipos de Documento',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Documento', 'url'=>array('create')),
	array('label'=>'Administrar Tipos de Documento', 'url'=>array('admin')),
);
?>

<h1>Tipos de Documento</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
