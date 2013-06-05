<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Usuarios'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	// array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Usuarios</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<p>
Opcionalmente puedes usar un operador de comparación como (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al inicio de cada valor de búsqueda, para especificar cómo realizar la comparación.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'email',
		'name',
		array(
			'header'=>'Rol',
			'value'=>'$data->rol',
			'filter' => CHtml::activeDropDownList($model, 'rol', Yii::app()->params['roles'], array('empty'=>'--')),
		),
		array(
			'header'=>'Empresa',
			'value'=>'$data->company ? $data->company->identifier : ""',
			'filter' => CHtml::activeDropDownList($model,'company_id',
				CHtml::listData(Company::model()->findAll(), 'id', 'identifier'), array('empty'=>'--')),
			'visible'=>Yii::app()->user->checkAccess('master-admin'),
		),
		/*
		'user_id',
		'createdon',
		'updatedon',
		*/
		array(
			'class'=>'CButtonColumn',
            'afterDelete' => 'function(link,success,data){
                var result = $.parseJSON(data);
                if (!result.delete) alert(result.message);
            }',
		),
	),
)); ?>
