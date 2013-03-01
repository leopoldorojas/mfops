<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */

$this->breadcrumbs=array(
	'Reglas Contables'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List AccountingRule', 'url'=>array('index')),
	array('label'=>'Registrar Regla Contable', 'url'=>array('create')),
	array('label'=>'Actualizar Regla Contable', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Regla Contable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Reglas Contables', 'url'=>array('admin')),
);
?>

<h1>Regla Contable Id <?php echo $model->id; ?></h1>

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
