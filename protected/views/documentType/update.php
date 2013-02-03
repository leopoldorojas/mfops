<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'Document Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'Create DocumentType', 'url'=>array('create')),
	array('label'=>'View DocumentType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DocumentType', 'url'=>array('admin')),
);
?>

<h1>Update DocumentType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>