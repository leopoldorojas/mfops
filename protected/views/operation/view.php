<?php
/* @var $this OperationController */
/* @var $model Operation */

$this->breadcrumbs=array(
	'Operations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Operation', 'url'=>array('index')),
	array('label'=>'Create Operation', 'url'=>array('create')),
	array('label'=>'Update Operation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Operation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Operation', 'url'=>array('admin')),
);
?>

<h1>View Operation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'input',
		'bank',
		'type_id',
		'operation_date',
		'amount',
		'entity_id',
		'entity_name',
		'reference_price',
		'description',
		'user_id',
		'createdon',
		'updatedon',
	),
)); ?>
