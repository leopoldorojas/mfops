<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Tipos de Documento'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	// array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Documento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#document-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tipos de Documento</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php /* <p>
Opcionalmente puedes usar un operador de comparación como (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al inicio de cada valor de búsqueda, para especificar cómo realizar la comparación.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --> */ ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'document-type-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		'id',
		'description',
		'next_number',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
            'afterDelete' => 'function(link,success,data){
                var result = $.parseJSON(data);
                if (!result.delete) alert(result.message);
            }',
		),
	),
)); ?>
