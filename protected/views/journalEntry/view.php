<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */

$this->breadcrumbs=array(
	'Journal Entries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JournalEntry', 'url'=>array('index')),
	array('label'=>'Create JournalEntry', 'url'=>array('create')),
	array('label'=>'Update JournalEntry', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JournalEntry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JournalEntry', 'url'=>array('admin')),
);
?>

<h1>View JournalEntry #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'debitAccount',
		'debitAmount',
		'creditAccount',
		'creditAmount',
		'branchID',
		'JournalEntry_date',
		'notes',
		'user_id',
		'createdon',
		'updatedon',
	),
)); ?>
