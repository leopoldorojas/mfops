<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'Document Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'Manage DocumentType', 'url'=>array('admin')),
);
?>

<h1>Create DocumentType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>