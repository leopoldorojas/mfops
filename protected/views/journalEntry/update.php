<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */

$this->breadcrumbs=array(
	'Journal Entries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JournalEntry', 'url'=>array('index')),
	array('label'=>'Create JournalEntry', 'url'=>array('create')),
	array('label'=>'View JournalEntry', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JournalEntry', 'url'=>array('admin')),
);
?>

<h1>Update JournalEntry <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>