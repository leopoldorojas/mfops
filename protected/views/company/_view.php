<?php
/* @var $this CompanyController */
/* @var $data Company */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identifier')); ?>:</b>
	<?php echo CHtml::encode($data->identifier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_number')); ?>:</b>
	<?php echo CHtml::encode($data->id_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_line_1')); ?>:</b>
	<?php echo CHtml::encode($data->address_line_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_line_2')); ?>:</b>
	<?php echo CHtml::encode($data->address_line_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone')); ?>:</b>
	<?php echo CHtml::encode($data->telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenant_url')); ?>:</b>
	<?php echo CHtml::encode($data->tenant_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenant_user')); ?>:</b>
	<?php echo CHtml::encode($data->tenant_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenant_password')); ?>:</b>
	<?php echo CHtml::encode($data->tenant_password); ?>
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