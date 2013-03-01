<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */

$this->breadcrumbs=array(
	'Asientos Diarios'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'List JournalEntry', 'url'=>array('index')),
	array('label'=>'Administrar Asientos Diarios', 'url'=>array('admin')),
);
?>

<h1>Registrar Asiento Diario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>