<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Categorías de Movimientos'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	// array('label'=>'Listar Categorías', 'url'=>array('index')),
	array('label'=>'Crear Categoría', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('movement-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Categorías de Movimientos</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<? /* <p>
Opcionalmente puedes usar un operador de comparación como (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al inicio de cada valor de búsqueda, para especificar cómo realizar la comparación.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --> */ ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'movement-category-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'description',
		array(
			'class'=>'CButtonColumn',
            'afterDelete' => 'function(link,success,data){
                var result = $.parseJSON(data);
                if (!result.delete) alert(result.message);
            }',
		),
	),
)); ?>
