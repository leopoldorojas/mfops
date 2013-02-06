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

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'documentType_id'); ?>
		<?php echo $form->dropdownlist($model,'documentType_id',
			CHtml::listData(DocumentType::model()->findAll(), 'id', 'description'), array('empty'=>'Seleccione tipo de documento')); ?>
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
		<?php echo $form->dropdownlist($model,'entity_id', 
			CHtml::listData(OperationEntity::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione entidad de la operación')); ?>
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
	<hr />
	<table>
	<tr>
		<th>Línea de Detalle</th>
		<th><?php echo $form->labelEx($operations[0],'input'); ?></th>
		<th><?php echo $form->labelEx($operations[0],'bank'); ?></th>
		<th><?php echo $form->labelEx($operations[0],'type_id'); ?></th>
		<th><?php echo $form->labelEx($operations[0],'operation_date'); ?></th>
	</tr>
	<tr>
		<th><?php echo $form->labelEx($operations[0],'amount'); ?></th>
		<th><?php echo $form->labelEx($operations[0],'entity_id'); ?></th>
		<th><?php echo $form->labelEx($operations[0],'entity_name'); ?></th>
		<th><?php echo $form->labelEx($operations[0],'reference_price'); ?></th>
		<th><?php echo $form->labelEx($operations[0],'description'); ?></th>
	</tr>
	<?php foreach($operations as $i=>$operation): ?>
	<tr>
		<td>Detalle <?php echo $i+1; ?></td>
		<td>
			<?php echo $form->dropdownlist($operation,"[$i]input",
				array(true=>'Entrada de dinero', false=>'Salida de dinero'), array('empty'=>'¿Entrada o Salida de dinero?')); ?>
			<?php echo $form->error($operation,"[$i]input"); ?>
		</td>

		<td>
			<?php echo $form->dropdownlist($operation,"[$i]bank",
				array(false=>'Caja', true=>'Bancos'), array('empty'=>'¿Caja o Bancos?')); ?>
			<?php echo $form->error($operation,"[$i]bank"); ?>
		</td>

		<td>
			<?php echo $form->dropdownlist($operation,"[$i]type_id",
				CHtml::listData(MovementType::model()->findAll(), 'id', 'description'), array('empty'=>'Seleccione tipo de movimiento')); ?>
			<?php echo $form->error($operation,"[$i]type_id"); ?>
		</td>

		<td>
			<?php echo CHtml::activeDateField($operation,"[$i]operation_date"); ?>
			<?php echo $form->error($operation,"[$i]operation_date"); ?>
		</td>
	</tr>
	<tr>
		<td><?php echo CHtml::activeTextField($operation,"[$i]amount"); ?></td>
		<td>
			<?php echo $form->dropdownlist($operation,"[$i]entity_id", 
				CHtml::listData(OperationEntity::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione entidad de la operación')); ?>
			<?php echo $form->error($operation,"[$i]entity_id"); ?>
		</td>
		<td>
			<?php echo CHtml::activeTextField($operation,"[$i]entity_name"); ?>
			<?php echo $form->error($operation,"[$i]entity_name"); ?>
		</td>
		<td>
			<?php echo CHtml::activeTextField($operation,"[$i]reference_price"); ?>
			<?php echo $form->error($operation,"[$i]reference_price"); ?>
		</td>
		<td>
			<?php echo CHtml::activeTextArea($operation,"[$i]description"); ?>
			<?php echo $form->error($operation,"[$i]description"); ?>
		</td>
	</tr>
	<tr>
		<td colspan="5"><hr /></td>
	</tr>
	<?php endforeach; ?>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->