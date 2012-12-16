<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */

$this->breadcrumbs=array(
	'Movement Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MovementCategory', 'url'=>array('index')),
	array('label'=>'Manage MovementCategory', 'url'=>array('admin')),
);
?>

<h1>Create MovementCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>