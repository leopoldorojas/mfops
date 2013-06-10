<?php
/* @var $this AccountingRuleController */
/* @var $model AccountingRule */
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
		<?php echo $form->label($model,'input'); ?>
		<?php echo $form->dropdownlist($model,'input',
			array(true=>'Entrada de dinero', false=>'Salida de dinero'), array('empty'=>'¿Entrada o Salida de dinero?')); ?>
	</div>	

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->dropdownlist($model,'type_id',
			CHtml::listData(MovementType::model()->findAll(array('order'=>'description')), 'id', 'description'), array('empty'=>'Seleccione tipo de movimiento')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank'); ?>
		<?php echo $form->dropdownlist($model,'bank',
			array(false=>'Caja', true=>'Bancos'), array('empty'=>'¿Caja o Bancos?')); ?>
	</div>	

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debitAccount1'); ?>
		<?php echo $form->textField($model,'debitAccount1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creditAccount1'); ?>
		<?php echo $form->textField($model,'creditAccount1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<?php /* <div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div> */ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->