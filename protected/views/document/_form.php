<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'documentType_id'); ?>
		<?php echo $form->textField($model,'documentType_id'); ?>
		<?php echo $form->error($model,'documentType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_date'); ?>
		<?php echo $form->textField($model,'document_date'); ?>
		<?php echo $form->error($model,'document_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity_id'); ?>
		<?php echo $form->textField($model,'entity_id'); ?>
		<?php echo $form->error($model,'entity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity_name'); ?>
		<?php echo $form->textField($model,'entity_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'entity_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon'); ?>
		<?php echo $form->error($model,'createdon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatedon'); ?>
		<?php echo $form->textField($model,'updatedon'); ?>
		<?php echo $form->error($model,'updatedon'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->