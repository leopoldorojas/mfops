<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'journal-entry-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'debitAccount'); ?>
		<?php echo $form->textField($model,'debitAccount',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'debitAccount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debitAmount'); ?>
		<?php echo $form->textField($model,'debitAmount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'debitAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditAccount'); ?>
		<?php echo $form->textField($model,'creditAccount',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'creditAccount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditAmount'); ?>
		<?php echo $form->textField($model,'creditAmount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'creditAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branchID'); ?>
		<?php echo $form->textField($model,'branchID'); ?>
		<?php echo $form->error($model,'branchID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'journalEntry_date'); ?>
		<?php echo $form->textField($model,'journalEntry_date'); ?>
		<?php echo $form->error($model,'journalEntry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
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