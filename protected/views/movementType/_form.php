<?php
/* @var $this MovementTypeController */
/* @var $model MovementType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'movement-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'movement_category_id'); ?>
		<?php echo $form->dropdownlist($model,'movement_category_id',
			CHtml::listData(MovementCategory::model()->findAll(), 'id', 'description'), array('empty'=>'Seleccione una Categoría de Movimiento')); ?>
		<?php echo $form->error($model,'movement_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'with_price'); ?>
		<?php echo $form->checkBox($model,'with_price'); ?>
		<?php echo $form->error($model,'with_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->