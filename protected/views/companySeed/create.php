<?php
/* @var $this CompanySeedController */
/* @var $model CompanySeed (type Form) */

$this->breadcrumbs=array(
	'Administración de Tipos' => array('/site/typesAdmin'),
	'Cargar Datos Iniciales de Empresa',
);

if($result != 0) {
  ?>
	  <p>El resultado fue <? echo $result; ?></p>
  <? }
?>

<h1>Cargar Datos Iniciales de Empresa</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-seed-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'source_company'); ?>
		<?php echo $form->dropdownlist($model,'source_company',
			CHtml::listData(Company::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione la Empresa Origen')); ?>
		<?php echo $form->error($model,'source_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'target_company'); ?>
		<?php echo $form->dropdownlist($model,'target_company',
			CHtml::listData(Company::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione la Empresa Destino')); ?>
		<?php echo $form->error($model,'target_company'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Cargar Datos'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>