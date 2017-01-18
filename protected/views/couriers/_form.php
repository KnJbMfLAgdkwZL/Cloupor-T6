<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
    $(document).ready(function ()
    {
		$("input[name='Couriers[DOB]'], input[name='Couriers[Start_Date]'], input[name='Couriers[Finish_Date]']").datepicker();
    });
</script>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'couriers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
		<?= Yii::t('main-ui', 'Fields with'); ?>
		<span class="required">*</span>
		<?= Yii::t('main-ui', 'are required.'); ?>
	</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Name',array('label'=>Yii::t('main-ui','Name'))); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Lastname',array('label'=>Yii::t('main-ui','Lastname'))); ?>
		<?php echo $form->textField($model,'Lastname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Lastname'); ?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model,'Support',array('label'=>Yii::t('main-ui','Support')));
			$list = Users::model()->getAssocList(2);
			echo CHtml::dropDownList('Couriers[Support]', $model['Support'], $list);
		?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'DOB',array('label'=>Yii::t('main-ui','Date Of Birth'))); ?>
		<?php echo $form->textField($model,'DOB',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'DOB'); ?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model,'Sex',array('label'=>Yii::t('main-ui','Sex')));
			echo CHtml::dropDownList('Couriers[Sex]', $model['Sex'], array('Women', 'Man'));
			echo $form->error($model,'Sex');
		?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Street',array('label'=>Yii::t('main-ui','Street'))); ?>
		<?php echo $form->textField($model,'Street',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Street'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Appartment',array('label'=>Yii::t('main-ui','Appartment'))); ?>
		<?php echo $form->textField($model,'Appartment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Appartment'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Zip',array('label'=>Yii::t('main-ui','Zip'))); ?>
		<?php echo $form->textField($model,'Zip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Zip'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'City',array('label'=>Yii::t('main-ui','City'))); ?>
		<?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'City'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Country',array('label'=>Yii::t('main-ui','Country'))); ?>
		<?php echo $form->textField($model,'Country',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Country'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'DHL_Office',array('label'=>Yii::t('main-ui','DHL Office'))); ?>
		<?php echo $form->textField($model,'DHL_Office',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'DHL_Office'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Email',array('label'=>Yii::t('main-ui','Email'))); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Skype_ICQ',array('label'=>Yii::t('main-ui','Skype/ICQ'))); ?>
		<?php echo $form->textField($model,'Skype_ICQ',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Skype_ICQ'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Phone',array('label'=>Yii::t('main-ui','Phone'))); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Phone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Scan_ID',array('label'=>Yii::t('main-ui','Scan ID'))); ?>
		<?php echo $form->textField($model,'Scan_ID',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Scan_ID'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Scan_Registration',array('label'=>Yii::t('main-ui','Scan Registration'))); ?>
		<?php echo $form->textField($model,'Scan_Registration',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Scan_Registration'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Scan_Agreement',array('label'=>Yii::t('main-ui','Scan Agreement'))); ?>
		<?php echo $form->textField($model,'Scan_Agreement',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Scan_Agreement'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Start_Date',array('label'=>Yii::t('main-ui','Start Date'))); ?>
		<?php echo $form->textField($model,'Start_Date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Start_Date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Finish_Date',array('label'=>Yii::t('main-ui','Finish Date'))); ?>
		<?php echo $form->textField($model,'Finish_Date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Finish_Date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Pay_Comment',array('label'=>Yii::t('main-ui','Pay Comment'))); ?>
		<?php echo $form->textArea($model,'Pay_Comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Pay_Comment'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Staff_Comment',array('label'=>Yii::t('main-ui','Staff Comment'))); ?>
		<?php echo $form->textArea($model,'Staff_Comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Staff_Comment'); ?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model, 'Status',array('label'=>Yii::t('main-ui','Status')));
			$status = array('New', 'Test', 'Active','Problem', 'Rat', 'Veteran');
			echo CHtml::dropDownList('Couriers[Status]', $model['Status'], $status);
			echo $form->error($model,'Status');
		?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui','Create') : Yii::t('main-ui','Save')); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->