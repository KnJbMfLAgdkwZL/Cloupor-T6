<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Login')); ?>:</b>
	<?php echo CHtml::encode($data->Login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Reg_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Reg_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Role')); ?>:</b>
	<?php
		echo CHtml::encode($data->users_roles->Name);
	?>
	<br />
</div>