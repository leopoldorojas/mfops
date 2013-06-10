<?php
/* @var $this OperationController */
/* @var $model Operation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'operation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'input'); ?>
		<?php echo $form->dropdownlist($model,'input',
			array(true=>'Entrada de dinero', false=>'Salida de dinero'), array('empty'=>'¿Entrada o Salida de dinero?')); ?>
		<?php echo $form->error($model,'input'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'bank'); ?>
		<?php echo $form->dropdownlist($model,'bank',
			array(false=>'Caja', true=>'Bancos'), array('empty'=>'¿Caja o Bancos?')); ?>
		<?php echo $form->error($model,'bank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->dropdownlist($model,'type_id',
			CHtml::listData(MovementType::model()->findAll(array('order'=>'description')), 'id', 'description'), array('empty'=>'Seleccione tipo de movimiento')); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operation_date'); ?>
		<?php echo $form->dateField($model,'operation_date'); ?>
		<?php echo $form->error($model,'operation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity_id'); ?>
		<?php echo $form->dropdownlist($model,'entity_id', 
			CHtml::listData(OperationEntity::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione entidad de la operación')); ?>
		<?php echo $form->error($model,'entity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity_name'); ?>
		<?php echo $form->textField($model,'entity_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'entity_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reference_price'); ?>
		<?php echo $form->textField($model,'reference_price',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'reference_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_id'); ?>
		<?php echo $form->textField($model,'document_id',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'document_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->