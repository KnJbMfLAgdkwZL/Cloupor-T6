<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('Lastname')); ?>:</b>
	<?php echo CHtml::encode($data->Lastname); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('Support')); ?>:</b>
	<?php
		if(isset($data->Supp->Login))
		{
			echo CHtml::encode($data->Supp->Login);
		}
		else
		{
			echo CHtml::encode('');
		}
	?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('DOB')); ?>:</b>
	<?php
		//echo CHtml::encode($data->DOB);
		echo CHtml::encode(date('m/d/Y', $data->DOB));
	?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('Sex')); ?>:</b>
	<?php
		echo CHtml::encode($data->Sex==0 ? 'Women' : 'Man');

	?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('Street')); ?>:</b>
	<?php echo CHtml::encode($data->Street); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Appartment')); ?>:</b>
	<?php echo CHtml::encode($data->Appartment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Zip')); ?>:</b>
	<?php echo CHtml::encode($data->Zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Country')); ?>:</b>
	<?php echo CHtml::encode($data->Country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DHL_Office')); ?>:</b>
	<?php echo CHtml::encode($data->DHL_Office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Skype_ICQ')); ?>:</b>
	<?php echo CHtml::encode($data->Skype_ICQ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Phone')); ?>:</b>
	<?php echo CHtml::encode($data->Phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Scan_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Scan_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Scan_Registration')); ?>:</b>
	<?php echo CHtml::encode($data->Scan_Registration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Scan_Agreement')); ?>:</b>
	<?php echo CHtml::encode($data->Scan_Agreement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Start_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Start_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Finish_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Finish_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pay_Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Pay_Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Staff_Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Staff_Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	*/ ?>
</div>