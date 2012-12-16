<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */

$this->breadcrumbs=array(
	'Accounting Rules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountingRule', 'url'=>array('index')),
	array('label'=>'Manage AccountingRule', 'url'=>array('admin')),
);
?>

<h1>Create AccountingRule</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>