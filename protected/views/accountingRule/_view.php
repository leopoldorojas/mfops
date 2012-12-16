<?php
/* @var $this AccountingRuleController */
/* @var $data AccountingRule */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input')); ?>:</b>
	<?php echo CHtml::encode($data->input); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debitAccount1')); ?>:</b>
	<?php echo CHtml::encode($data->debitAccount1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditAccount1')); ?>:</b>
	<?php echo CHtml::encode($data->creditAccount1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdon')); ?>:</b>
	<?php echo CHtml::encode($data->createdon); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedon')); ?>:</b>
	<?php echo CHtml::encode($data->updatedon); ?>
	<br />

	*/ ?>

</div>