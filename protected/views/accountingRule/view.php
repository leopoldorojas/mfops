<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */

$this->breadcrumbs=array(
	'Accounting Rules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AccountingRule', 'url'=>array('index')),
	array('label'=>'Create AccountingRule', 'url'=>array('create')),
	array('label'=>'Update AccountingRule', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccountingRule', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountingRule', 'url'=>array('admin')),
);
?>

<h1>View AccountingRule #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'input',
		'type_id',
		'bank',
		'description',
		'debitAccount1',
		'creditAccount1',
		'user_id',
		'createdon',
		'updatedon',
	),
)); ?>
