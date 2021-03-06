<?php
/* @var $this MovementTypeController */
/* @var $data MovementType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movement_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->movement_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php if (Yii::app()->user->name == 'admin') { ?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('with_price')); ?>:</b>
		<?php echo CHtml::encode($data->with_price ? "Sí" : "No"); ?>
		<br />
	<?php } ?>

</div>