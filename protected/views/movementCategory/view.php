<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */

$this->breadcrumbs=array(
	'Movement Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MovementCategory', 'url'=>array('index')),
	array('label'=>'Create MovementCategory', 'url'=>array('create')),
	array('label'=>'Update MovementCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MovementCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MovementCategory', 'url'=>array('admin')),
);
?>

<h1>View MovementCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'user_id',
		'createdon',
		'updatedon',
	),
)); ?>
