<?php
/* @var $this JournalEntryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asientos Diarios',
);

$this->menu=array(
	array('label'=>'Registrar Asiento Diario', 'url'=>array('create')),
	array('label'=>'Administrar Asientos Diarios', 'url'=>array('admin')),
);
?>

<h1>Asientos Diarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
