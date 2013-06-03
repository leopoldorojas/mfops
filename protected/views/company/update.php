<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Empresas'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	// array('label'=>'List Company', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	// array('label'=>'View Company', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Empresas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Empresa <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>