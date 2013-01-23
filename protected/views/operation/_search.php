<?php
/* @var $this OperationController */
/* @var $model Operation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'input'); ?>
		<?php echo $form->radioButtonList($model,'input', array(true=>'Entrada de dinero', false=>'Salida de dinero')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank'); ?>
		<?php echo $form->radioButtonList($model,'bank', array(true=>'Bancos', false=>'Caja')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->dropdownlist($model,'type_id',
			CHtml::listData(MovementType::model()->findAll(), 'id', 'description'), array('empty'=>'Seleccione tipo de movimiento')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operation_date'); ?>
		<?php echo $form->textField($model,'operation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entity_id'); ?>
		<?php echo $form->dropdownlist($model,'entity_id',
			CHtml::listData(OperationEntity::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione entidad de operación')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entity_name'); ?>
		<?php echo $form->textField($model,'entity_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reference_price'); ?>
		<?php echo $form->textField($model,'reference_price',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->