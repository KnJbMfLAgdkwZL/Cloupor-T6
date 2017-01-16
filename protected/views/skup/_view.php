<?php
/* @var $this SkupController */
/* @var $data Skup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Goods')); ?>:</b>
	<?php echo CHtml::encode($data->Goods); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('No1')); ?>:</b>
	<?php echo CHtml::encode($data->No1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('No2')); ?>:</b>
	<?php echo CHtml::encode($data->No2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('No3')); ?>:</b>
	<?php echo CHtml::encode($data->No3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Skupforever')); ?>:</b>
	<?php echo CHtml::encode($data->Skupforever); ?>
	<br />


</div>