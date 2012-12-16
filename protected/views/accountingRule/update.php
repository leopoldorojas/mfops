<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */

$this->breadcrumbs=array(
	'Accounting Rules'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountingRule', 'url'=>array('index')),
	array('label'=>'Create AccountingRule', 'url'=>array('create')),
	array('label'=>'View AccountingRule', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccountingRule', 'url'=>array('admin')),
);
?>

<h1>Update AccountingRule <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>