<?php
/* @var $this DocumentController */
/* @var $model Document */

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/vendors/jquery.printPage.js');

$this->breadcrumbs=array(
	'Documentos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Registrar Documento', 'url'=>array('createRestfulBatch')),
	// array('label'=>'Actualizar Documento', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Borrar Documento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que desear borrar esto del sistema?')),
	array('label'=>'Consultar Documentos', 'url'=>array('admin')),
);
?>

<h1>Impresión de Documento Id <?php echo $model->id; ?></h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'documentType_id',
		'number',
		'document_date',
		'entity_id',
		'entity_name',
		'description',
	),
)); 
?>
