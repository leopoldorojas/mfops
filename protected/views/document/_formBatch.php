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
		'name'=>'form',
		'ng-submit'=>'submit()',
	),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'documentType_id'); ?>
		<select
			ng-model='document.documentType_id' required 
			ng-options="document_type.id as document_type.description for document_type in document_types"
			ng-change="setDocumentNumber()">
			<option value="">Seleccione tipo de documento</option>
		</select>
		<?php echo $form->error($model,'documentType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>60,'maxlength'=>255, 'ng-model'=>'document.number', 'ng-readonly'=>'documentReadOnly', 'ng-required'=>true)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_date'); ?>
		<?php echo $form->textField($model,'document_date',
			array(
				'ng-model'=>'document.document_date',
				'ui-date'=>'dateOptions',
				'ng-required'=>true,
			)
		); ?>
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
		<input ng-model="totalAmount" min="1" integer placeholder="Registre el monto" name="Document[totalAmount]" id="Document_totalAmount" type="number" value="0" />
		<span ng-show="form.$error.integer">¡El monto debe ser un número entero!</span>
		<?php echo $form->error($model,'totalAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calculatedTotalAmount'); ?>
		<?php echo $form->textField($model,'calculatedTotalAmount', array('readonly'=>true, 'value'=>'{{calculatedTotalAmount()}}')); ?>
	</div>

	<hr />
	<ul style="list-style-type: none; margin:0; padding:0;">
		<li ng-repeat="operation in operations">
			<table ng-class-odd="'odd-detail'" ng-class-even="'even-detail'"> 

	<tr>
		<td>
			<?php echo $form->dropdownlist($operation,"type_id",
				CHtml::listData(MovementType::model()->findAll(array('order'=>'description')), 'id', 'description'), array('empty'=>'Tipo de Movimiento', 'ng-model'=>'operation.type_id', 'ng-required'=>true)); ?>
			<?php echo $form->error($operation,"type_id"); ?>
		</td>

		<td>
			<?php echo $form->dropdownlist($operation,"input",
				array(true=>'Entrada de dinero', false=>'Salida de dinero'), array('empty'=>'Entrada o Salida', 'ng-model'=>'operation.input', 'ng-required'=>true)); ?>
			<?php echo $form->error($operation,"input"); ?>
		</td>

		<td>
			<?php echo $form->dropdownlist($operation,"bank",
				array(false=>'Caja', true=>'Bancos'), array('empty'=>'Caja o Bancos', 'ng-model'=>'operation.bank', 'ng-required'=>true)); ?>
			<?php echo $form->error($operation,"bank"); ?>
		</td>

		<td>
			<?php echo $form->textField($operation,'operation_date',
				array(
					'ng-model'=>'operation.operation_date',
					'ui-date'=>'dateOptions',
					'id'=>'Operation_operation_date_{{$index + 1}}',
					'placeholder'=>'Fecha de Operación',
				)
			); ?>
			<?php echo $form->error($operation,"operation_date"); ?>
		</td>

		<td>
			<?php echo CHtml::activeNumberField($operation,"amount", array('placeholder'=>'Monto del detalle', 'ng-model'=>'operation.amount', 'min'=>'1')); ?>
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
		<td ng-show='showReferencePrice(operation)'>
			<?php echo CHtml::activeTextField($operation,"reference_price", array('placeholder'=>'Precio de Referencia de la Acción', 'ng-model'=>'operation.reference_price', 'ng-required'=>'showReferencePrice(operation)')); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar Documento' : 'Grabar', array('ng-disabled'=>'amountNotValid() || loading')); ?>
	</div>

	<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/ajaxSpinner.gif', 'Ajax Spinner', array('width'=>'20px', 'ng-show'=>'loading')) ?>

<?php $this->endWidget(); ?>

</div><!-- form -->