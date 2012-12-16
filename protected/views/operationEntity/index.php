<?php
/* @var $this OperationEntityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Operation Entities',
);

$this->menu=array(
	array('label'=>'Create OperationEntity', 'url'=>array('create')),
	array('label'=>'Manage OperationEntity', 'url'=>array('admin')),
);
?>

<h1>Operation Entities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
