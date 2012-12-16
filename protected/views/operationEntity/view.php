<?php
/* @var $this OperationEntityController */
/* @var $model OperationEntity */

$this->breadcrumbs=array(
	'Operation Entities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List OperationEntity', 'url'=>array('index')),
	array('label'=>'Create OperationEntity', 'url'=>array('create')),
	array('label'=>'Update OperationEntity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OperationEntity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OperationEntity', 'url'=>array('admin')),
);
?>

<h1>View OperationEntity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'user_id',
		'createdon',
		'updatedon',
	),
)); ?>
