<?php
/* @var $this JournalEntryController */
/* @var $data JournalEntry */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debitAccount')); ?>:</b>
	<?php echo CHtml::encode($data->debitAccount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debitAmount')); ?>:</b>
	<?php echo CHtml::encode($data->debitAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditAccount')); ?>:</b>
	<?php echo CHtml::encode($data->creditAccount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditAmount')); ?>:</b>
	<?php echo CHtml::encode($data->creditAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branchID')); ?>:</b>
	<?php echo CHtml::encode($data->branchID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('journalEntry_date')); ?>:</b>
	<?php echo CHtml::encode($data->journalEntry_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdon')); ?>:</b>
	<?php echo CHtml::encode($data->createdon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedon')); ?>:</b>
	<?php echo CHtml::encode($data->updatedon); ?>
	<br />

	*/ ?>

</div>