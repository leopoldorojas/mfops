<?php
/* @var $this OperationEntityController */
/* @var $model OperationEntity */

$this->breadcrumbs=array(
	'Operation Entities'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OperationEntity', 'url'=>array('index')),
	array('label'=>'Create OperationEntity', 'url'=>array('create')),
	array('label'=>'View OperationEntity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OperationEntity', 'url'=>array('admin')),
);
?>

<h1>Update OperationEntity <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>