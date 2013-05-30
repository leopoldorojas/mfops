<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'identifier'); ?>
		<?php echo $form->textField($model,'identifier',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'identifier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_number'); ?>
		<?php echo $form->textField($model,'id_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'id_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line_1'); ?>
		<?php echo $form->textField($model,'address_line_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address_line_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line_2'); ?>
		<?php echo $form->textField($model,'address_line_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address_line_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_url'); ?>
		<?php echo $form->textField($model,'tenant_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tenant_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_user'); ?>
		<?php echo $form->textField($model,'tenant_user',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tenant_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenant_password'); ?>
		<?php echo $form->textField($model,'tenant_password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tenant_password'); ?>
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