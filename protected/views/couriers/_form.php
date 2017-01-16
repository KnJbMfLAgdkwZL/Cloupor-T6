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
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Lastname'); ?>
		<?php echo $form->textField($model,'Lastname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Lastname'); ?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model,'Support');
			$list = Users::model()->getAssocList(2);
			echo CHtml::dropDownList('Couriers[Support]', $model['Support'], $list);
		?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'DOB'); ?>
		<?php echo $form->textField($model,'DOB',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'DOB'); ?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model,'Sex');
			//echo $form->textField($model,'Sex');
			echo CHtml::dropDownList('Couriers[Sex]', $model['Sex'], array('Women', 'Man'));
			echo $form->error($model,'Sex');
		?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Street'); ?>
		<?php echo $form->textField($model,'Street',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Street'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Appartment'); ?>
		<?php echo $form->textField($model,'Appartment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Appartment'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Zip'); ?>
		<?php echo $form->textField($model,'Zip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Zip'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'City'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Country'); ?>
		<?php echo $form->textField($model,'Country',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Country'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'DHL_Office'); ?>
		<?php echo $form->textField($model,'DHL_Office',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'DHL_Office'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Skype_ICQ'); ?>
		<?php echo $form->textField($model,'Skype_ICQ',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Skype_ICQ'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Phone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Scan_ID'); ?>
		<?php echo $form->textField($model,'Scan_ID',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Scan_ID'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Scan_Registration'); ?>
		<?php echo $form->textField($model,'Scan_Registration',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Scan_Registration'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Scan_Agreement'); ?>
		<?php echo $form->textField($model,'Scan_Agreement',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Scan_Agreement'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Start_Date'); ?>
		<?php echo $form->textField($model,'Start_Date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Start_Date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Finish_Date'); ?>
		<?php echo $form->textField($model,'Finish_Date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Finish_Date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Pay_Comment'); ?>
		<?php echo $form->textArea($model,'Pay_Comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Pay_Comment'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Staff_Comment'); ?>
		<?php echo $form->textArea($model,'Staff_Comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Staff_Comment'); ?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model, 'Status');
			$status = array('New', 'Test', 'Active','Problem', 'Rat', 'Veteran');
			echo CHtml::dropDownList('Couriers[Status]', $model['Status'], $status);
			echo $form->error($model,'Status');
		?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->