<?php
/* @var $this JournalEntryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Journal Entries',
);

$this->menu=array(
	array('label'=>'Create JournalEntry', 'url'=>array('create')),
	array('label'=>'Manage JournalEntry', 'url'=>array('admin')),
);
?>

<h1>Journal Entries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
