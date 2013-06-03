<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Empresas'=>array('admin'),
	$model->name,
);

$this->menu=array(
	// array('label'=>'List Company', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Actualizar Empresa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Administrar Empresas', 'url'=>array('admin')),
);
?>

<h1>Empresa Id <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'identifier',
		'id_number',
		'address_line_1',
		'address_line_2',
		'city',
		'country',
		'telephone',
		'email',
		'website',
		'tenant_url',
		'tenant_user',
		'tenant_password',
	),
)); ?>
