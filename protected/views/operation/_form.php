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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php /*
	<div class="row-button compactRadioGroup">
		<?php echo $form->label($searchForm,'filterByAssignmentToService', array('class'=>'labelRadio')); ?>
		<?php echo $form->radioButtonList($searchForm, 'filterByAssignmentToService', 
			array(
				'0'=>'All Activities',
				'1'=>'Without Services',
				'2'=>'With Services',
			),
			array(
				'separator'=>''
			)
		); ?>
	</div>

	<div class="row-button compactRadioGroup">
		<?php echo $form->label($searchForm,'filterByAssignmentToService', array('class'=>'labelRadio')); ?>
		<?php echo $form->radioButtonList($searchForm, 'filterByAssignmentToService', 
			array(
				'0'=>'All Activities',
				'1'=>'Without Services',
				'2'=>'With Services',
			),
			array(
				'separator'=>''
			)
		); ?>
	</div> */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'input'); ?>
		<?php echo $form->radioButtonList($model,'input', array(true=>'Money input', false=>'Money output')); ?>
		<?php echo $form->error($model,'input'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank'); ?>
		<?php echo $form->radioButtonList($model,'bank', array(true=>'Bank movement', false=>'Cash movement')); ?>
		<?php echo $form->error($model,'bank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->dropdownlist($model,'type_id',
			CHtml::listData(MovementType::model()->findAll(), 'id', 'description'), array('empty'=>'Please, select a Movement Type')); ?>
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
			CHtml::listData(OperationEntity::model()->findAll(), 'id', 'name'), array('empty'=>'Please, select an Operation Entity')); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->