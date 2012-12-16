<?php
/* @var $this OperationEntityController */
/* @var $model OperationEntity */

$this->breadcrumbs=array(
	'Operation Entities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OperationEntity', 'url'=>array('index')),
	array('label'=>'Manage OperationEntity', 'url'=>array('admin')),
);
?>

<h1>Create OperationEntity</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>