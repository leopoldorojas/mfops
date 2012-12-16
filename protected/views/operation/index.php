<?php
/* @var $this OperationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Operations',
);

$this->menu=array(
	array('label'=>'Create Operation', 'url'=>array('create')),
	array('label'=>'Manage Operation', 'url'=>array('admin')),
);
?>

<h1>Operations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
