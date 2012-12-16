<?php
/* @var $this MovementTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Movement Types',
);

$this->menu=array(
	array('label'=>'Create MovementType', 'url'=>array('create')),
	array('label'=>'Manage MovementType', 'url'=>array('admin')),
);
?>

<h1>Movement Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
