<?php
/* @var $this JournalEntryController */
/* @var $model JournalEntry */
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
		<?php echo $form->label($model,'debitAccount'); ?>
		<?php echo $form->textField($model,'debitAccount',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debitAmount'); ?>
		<?php echo $form->textField($model,'debitAmount',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creditAccount'); ?>
		<?php echo $form->textField($model,'creditAccount',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creditAmount'); ?>
		<?php echo $form->textField($model,'creditAmount',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'branchID'); ?>
		<?php echo $form->textField($model,'branchID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JournalEntry_date'); ?>
		<?php echo $form->textField($model,'JournalEntry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatedon'); ?>
		<?php echo $form->textField($model,'updatedon'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->