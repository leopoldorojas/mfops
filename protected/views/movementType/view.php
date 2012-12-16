<?php
/* @var $this MovementTypeController */
/* @var $model MovementType */

$this->breadcrumbs=array(
	'Movement Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MovementType', 'url'=>array('index')),
	array('label'=>'Create MovementType', 'url'=>array('create')),
	array('label'=>'Update MovementType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MovementType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MovementType', 'url'=>array('admin')),
);
?>

<h1>View MovementType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'movement_category_id',
		'description',
		'user_id',
		'createdon',
		'updatedon',
	),
)); ?>
