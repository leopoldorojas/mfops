<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */

$this->breadcrumbs=array(
	'Journal Entries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JournalEntry', 'url'=>array('index')),
	array('label'=>'Manage JournalEntry', 'url'=>array('admin')),
);
?>

<h1>Create JournalEntry</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>