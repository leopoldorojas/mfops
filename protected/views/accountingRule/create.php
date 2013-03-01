<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */

$this->breadcrumbs=array(
	'Reglas Contables'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'List AccountingRule', 'url'=>array('index')),
	array('label'=>'Administrar Reglas Contables', 'url'=>array('admin')),
);
?>

<h1>Registrar Regla Contable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>