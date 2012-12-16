<?php
/* @var $this AccountingRuleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounting Rules',
);

$this->menu=array(
	array('label'=>'Create AccountingRule', 'url'=>array('create')),
	array('label'=>'Manage AccountingRule', 'url'=>array('admin')),
);
?>

<h1>Accounting Rules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
