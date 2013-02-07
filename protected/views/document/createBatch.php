<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documentos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Administrar Documentos', 'url'=>array('admin')),
);
?>

<h1>Registrar Movimientos</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php echo $this->renderPartial('_formBatch', array(
	'model'=>$model,
	'operations'=>$operations,
	));
?>