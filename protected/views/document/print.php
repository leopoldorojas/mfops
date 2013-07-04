<?php
/* @var $this DocumentController */
/* @var $model Document */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/vendors/jquery.printPage.js');
$this->renderPartial('_headerToPrint', array('companyInfo'=>$companyInfo));
?>

<b><?php echo $model->document_type->description; ?> número: <?php echo $model->number; ?></b><br/>

<table width=285px>
<tr><td>Identificador:</td><td><?php echo $model->id; ?></td></tr>
<tr><td>Fecha:</td><td><?php echo $model->document_date; ?></td></tr>
<tr><td>Entidad:</td><td><?php echo $model->entity ? $model->entity->name : ''; ?></td></tr>
<tr><td>Detalle Entidad:</td><td><?php echo $model->entity_name; ?></td></tr>
<tr><td><b>Monto Total:</b></td><td><b><?php echo number_format($model->totalAmount,0); ?></b></td></tr>
</table>

<br/>
<b>Movimientos del Documento:</b><br/>
<?php 
	foreach ($model->operations as $operation)
	{ ?>
		<table width=285px>
		<tr><td>Identificador:</td><td><?php echo $operation->id; ?></td></tr>
		<tr><td>Comprobante de:</td><td><?php echo ($operation->input) ? 'Entrada de Dinero' : 'Salida de Dinero'; ?></td></tr>
		<tr><td>Movimiento de:</td><td><?php echo ($operation->bank) ? 'Bancos' : 'Caja'; ?></td></tr>
		<tr><td>Tipo:</td><td><?php echo $operation->movement_type->description; ?></td></tr>
		<tr><td>Fecha:</td><td><?php echo $operation->operation_date; ?></td></tr>
		<tr><td>Entidad:</td><td><?php echo $operation->entity ? $operation->entity->name : ''; ?></td></tr>
		<tr><td>Detalle Entidad:</td><td><?php echo $operation->entity_name; ?></td></tr>
		<tr><td><b>Monto:</b></td><td><b><?php echo number_format($operation->amount,0); ?></b></td></tr>
		</table><br>
	<?php }
?>
