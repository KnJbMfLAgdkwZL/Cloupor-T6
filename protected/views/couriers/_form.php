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
	'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-0">
			<span class="help-block">
				<?= Yii::t('main-ui', 'Fields with'); ?>
				<span class="required">*</span>
				<?= Yii::t('main-ui', 'are required.'); ?>
			</span>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Name',array('class'=>'col-lg-2 control-label','label'=>Yii::t('main-ui','Name'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Name'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Lastname',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Lastname'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Lastname',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Lastname'); ?>
	</div>
	<div class="form-group">
		<?php
			echo $form->labelEx($model,'Support',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Support')));
			$list = Users::model()->getAssocList(2);
			echo '<div class="col-lg-10">',
			CHtml::dropDownList('Couriers[Support]', $model['Support'], $list,array('class'=>'form-control',)),
			'</div>';
		?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'DOB',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Date Of Birth'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'DOB',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
		</div>
		<?php echo $form->error($model,'DOB'); ?>
	</div>
	<div class="form-group">
		<?php
			echo $form->labelEx($model,'Sex',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Sex')));
			echo '<div class="col-lg-10">',
			CHtml::dropDownList('Couriers[Sex]', $model['Sex'], array('Women', 'Man'),array('class'=>'form-control',)),
			'</div>';
			echo $form->error($model,'Sex');
		?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Street',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Street'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Street',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Street'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Appartment',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Appartment'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Appartment',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Appartment'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Zip',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Zip'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Zip',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Zip'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'City',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','City'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'City',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'City'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Country',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Country'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Country',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Country'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'DHL_Office',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','DHL Office'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'DHL_Office',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'DHL_Office'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Email',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Email'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Email',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Email'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Skype_ICQ',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Skype/ICQ'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Skype_ICQ',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Skype_ICQ'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Phone',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Phone'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Phone',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Phone'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Scan_ID',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Scan ID'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Scan_ID',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Scan_ID'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Scan_Registration',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Scan Registration'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Scan_Registration',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Scan_Registration'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Scan_Agreement',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Scan Agreement'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Scan_Agreement',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		</div>
		<?php echo $form->error($model,'Scan_Agreement'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Start_Date',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Start Date'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Start_Date',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
		</div>
		<?php echo $form->error($model,'Start_Date'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Finish_Date',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Finish Date'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Finish_Date',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
		</div>
		<?php echo $form->error($model,'Finish_Date'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Pay_Comment',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Pay Comment'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textArea($model,'Pay_Comment',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
		</div>
		<?php echo $form->error($model,'Pay_Comment'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Staff_Comment',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Staff Comment'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textArea($model,'Staff_Comment',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
		</div>
		<?php echo $form->error($model,'Staff_Comment'); ?>
	</div>
	<div class="form-group">
		<?php
			echo $form->labelEx($model, 'Status',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui','Status')));
			$status = array('New', 'Test', 'Active','Problem', 'Rat', 'Veteran');
			echo '<div class="col-lg-10">',
			CHtml::dropDownList('Couriers[Status]', $model['Status'], $status, array('class'=>'form-control',)),
			'</div>';
			echo $form->error($model,'Status');
		?>
	</div>
	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui','Create') : Yii::t('main-ui','Save'), array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->