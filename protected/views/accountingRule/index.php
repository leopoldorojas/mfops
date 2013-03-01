<?php
/* @var $this AccountingRuleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reglas Contables',
);

$this->menu=array(
	array('label'=>'Registrar Regla Contable', 'url'=>array('create')),
	array('label'=>'Administrar Regla Contable', 'url'=>array('admin')),
);
?>

<h1>Reglas Contables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
