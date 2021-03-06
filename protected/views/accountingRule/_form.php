<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accounting-rule-form',
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
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->dropdownlist($model,'type_id',
			CHtml::listData(MovementType::model()->findAll(array('order'=>'description')), 'id', 'description'), array('empty'=>'Seleccione un Tipo de Movimiento')); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank'); ?>
		<?php echo $form->dropdownlist($model,'bank',
			array(false=>'Caja', true=>'Bancos'), array('empty'=>'¿Caja o Bancos?')); ?>
		<?php echo $form->error($model,'bank'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debitAccount1'); ?>
		<?php echo $form->textField($model,'debitAccount1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'debitAccount1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditAccount1'); ?>
		<?php echo $form->textField($model,'creditAccount1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'creditAccount1'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->