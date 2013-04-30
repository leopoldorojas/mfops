<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<p>Recuerde poner el Próximo Número de Documento, ÚNICAMENTE si desea que el sistema le genere números automáticos cada vez que se registre un nuevo documento de ese tipo. Típicamente esto es necesario en documentos tipo Recibos, pero no en documentos tipo Facturas.</p>
	<p>Es importante también de que si está cambiando este número, asegúrese de cambiarlo con un número mayor al actual, pues de lo contrario el sistema podría evitar el registro de documentos con números duplicados que ya estén registrados anteriormente</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'next_number'); ?>
		<?php echo $form->textField($model,'next_number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'next_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->