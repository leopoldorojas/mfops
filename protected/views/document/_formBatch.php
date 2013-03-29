<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form" ng-controller="adminTotal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
	'action'=>false,
	'method'=>false,
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'ng-submit'=>'submit()',
	),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'documentType_id'); ?>
		<?php echo $form->dropdownlist($model,'documentType_id',
			CHtml::listData(DocumentType::model()->findAll(), 'id', 'description'), array('empty'=>'Seleccione tipo de documento', 'ng-model'=>'document.documentType_id')); ?>
		<?php echo $form->error($model,'documentType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>60,'maxlength'=>255, 'ng-model'=>'document.number')); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_date'); ?>
		<?php echo $form->textField($model,'document_date', array('ng-model'=>'document.document_date')); ?>
		<?php echo $form->error($model,'document_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity_id'); ?>
		<?php echo $form->dropdownlist($model,'entity_id', 
			CHtml::listData(OperationEntity::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione entidad de la operación', 'ng-model'=>'document.entity_id')); ?>
		<?php echo $form->error($model,'entity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity_name'); ?>
		<?php echo $form->textField($model,'entity_name',array('size'=>60,'maxlength'=>255, 'ng-model'=>'document.entity_name')); ?>
		<?php echo $form->error($model,'entity_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'ng-model'=>'document.description')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalAmount'); ?>
		<?php echo $form->textField($model,'totalAmount', array('ng-model'=>'totalAmount', 'placeholder'=>'Registre el monto')); ?>
		<?php echo $form->error($model,'totalAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calculatedTotalAmount'); ?>
		<?php echo $form->textField($model,'calculatedTotalAmount', array('readonly'=>true, 'value'=>'{{calculatedTotalAmount()}}')); ?>
	</div>

	<?php /* <hr />

	<table>
	<tr>
		<th>Línea de Detalle</th>
		<th><?php echo $form->labelEx($operation,'input'); ?></th>
		<th><?php echo $form->labelEx($operation,'bank'); ?></th>
		<th><?php echo $form->labelEx($operation,'type_id'); ?></th>
		<th><?php echo $form->labelEx($operation,'operation_date'); ?></th>
	</tr>
	<tr>
		<th><?php echo $form->labelEx($operation,'amount'); ?></th>
		<th><?php echo $form->labelEx($operation,'entity_id'); ?></th>
		<th><?php echo $form->labelEx($operation,'entity_name'); ?></th>
		<th><?php echo $form->labelEx($operation,'reference_price'); ?></th>
		<th><?php echo $form->labelEx($operation,'description'); ?></th>
	</tr>
	</table> */ ?>

	<hr />
	<ul style="list-style-type: none; margin:0; padding:0;">
		<li ng-repeat="operation in operations">
			<table ng-class-odd="'odd-detail'" ng-class-even="'even-detail'"> 

	<tr>
		<!-- <td>Detalle {{$index + 1}}</td> -->

		<td>
			<?php echo $form->dropdownlist($operation,"type_id",
				CHtml::listData(MovementType::model()->findAll(), 'id', 'description'), array('empty'=>'Tipo de Movimiento', 'ng-model'=>'operation.type_id')); ?>
			<?php echo $form->error($operation,"type_id"); ?>
		</td>

		<td>
			<?php echo $form->dropdownlist($operation,"input",
				array(true=>'Entrada de dinero', false=>'Salida de dinero'), array('empty'=>'Entrada o Salida', 'ng-model'=>'operation.input')); ?>
			<?php echo $form->error($operation,"input"); ?>
		</td>

		<td>
			<?php echo $form->dropdownlist($operation,"bank",
				array(false=>'Caja', true=>'Bancos'), array('empty'=>'Caja o Bancos', 'ng-model'=>'operation.bank')); ?>
			<?php echo $form->error($operation,"bank"); ?>
		</td>

		<td>
			<?php echo CHtml::activeDateField($operation,"operation_date", array('placeholder'=>'Fecha de Movimiento', 'ng-model'=>'operation.operation_date')); ?>
			<?php echo $form->error($operation,"operation_date"); ?>
		</td>

		<td>
			<?php echo CHtml::activeTextField($operation,"amount", array('placeholder'=>'Monto del detalle', 'ng-model'=>'operation.amount')); ?>
			<?php echo $form->error($operation,"amount"); ?>
		</td>

	</tr>
	<tr>

		<td>
			<?php echo $form->dropdownlist($operation,"entity_id", 
				CHtml::listData(OperationEntity::model()->findAll(), 'id', 'name'), array('empty'=>'Entidad de operación', 'ng-model'=>'operation.entity_id')); ?>
			<?php echo $form->error($operation,"entity_id"); ?>
		</td>

		<td>
			<?php echo CHtml::activeTextField($operation,"entity_name", array('placeholder'=>'Entidad', 'ng-model'=>'operation.entity_name')); ?>
			<?php echo $form->error($operation,"entity_name"); ?>
		</td>
		<td>
			<?php echo CHtml::activeTextField($operation,"reference_price", array('placeholder'=>'Precio de Referencia', 'ng-model'=>'operation.reference_price')); ?>
			<?php echo $form->error($operation,"reference_price"); ?>
		</td>

		<td colspan=2>
			<?php echo CHtml::activeTextArea($operation,"description", array('placeholder'=>'Descripción del Detalle', 'ng-model'=>'operation.description')); ?>
			<?php echo $form->error($operation,"description"); ?>
		</td>
	</tr>

			</table>
		</li>
		<li>
			<button ng-click="addOperation()" type="button">Agregar Movimiento</button>
			<button ng-click="removeOperation()" type="button">Remover Movimiento</button>
		</li>
		<li><hr /></li>
	</ul>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar Documento' : 'Grabar', array('ng-disabled'=>'amountNotValid()')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->