<?php
/* @var $this MovementCategoryController */
/* @var $model MovementCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'movement-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
<?php /*
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
	</div> */ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->