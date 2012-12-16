<?php
/* @var $this MovementCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Movement Categories',
);

$this->menu=array(
	array('label'=>'Create MovementCategory', 'url'=>array('create')),
	array('label'=>'Manage MovementCategory', 'url'=>array('admin')),
);
?>

<h1>Movement Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
