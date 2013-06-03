<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Empresas'=>array('admin'),
	'Crear',
);

$this->menu=array(
	// array('label'=>'List Company', 'url'=>array('index')),
	array('label'=>'Administrar Empresas', 'url'=>array('admin')),
);
?>

<h1>Crear Empresa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>