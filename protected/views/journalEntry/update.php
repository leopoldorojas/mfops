<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */

$this->breadcrumbs=array(
	'Asientos Diarios'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	// array('label'=>'List JournalEntry', 'url'=>array('index')),
	array('label'=>'Registrar Asiento Diario', 'url'=>array('create')),
	array('label'=>'Ver Asiento Diario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Asientos Diarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Asiento Diario <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>