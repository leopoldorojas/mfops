<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */

$this->breadcrumbs=array(
	'Reglas Contables'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	// array('label'=>'List AccountingRule', 'url'=>array('index')),
	array('label'=>'Registrar Regla Contable', 'url'=>array('create')),
	array('label'=>'Ver Regla Contable', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Reglas Contables', 'url'=>array('admin')),
);
?>

<h1>Actualizar Regla Contable <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>