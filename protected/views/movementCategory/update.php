<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */

$this->breadcrumbs=array(
	'Movement Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MovementCategory', 'url'=>array('index')),
	array('label'=>'Create MovementCategory', 'url'=>array('create')),
	array('label'=>'View MovementCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MovementCategory', 'url'=>array('admin')),
);
?>

<h1>Update MovementCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>