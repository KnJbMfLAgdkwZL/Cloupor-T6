<?php
/* @var $this CouriersController */
/* @var $model Couriers */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Lastname'); ?>
		<?php echo $form->textField($model,'Lastname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php 
			echo $form->label($model,'Support');
			$list = Users::model()->getAssocList(2);
			echo CHtml::dropDownList('Couriers[Support]', $model['Support'], $list);
		?>
	</div>

	<!--
	<div class="row">
		<?php echo $form->label($model,'DOB'); ?>
		<?php echo $form->textField($model,'DOB',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	
	<div class="row">
		<?php
			//echo $form->label($model,'Sex');
			//echo $form->textField($model,'Sex');
			//echo CHtml::dropDownList('Couriers[Sex]', $model['Sex'], array('Women', 'Man'));
		?>
	</div>
	-->

	<div class="row">
		<?php echo $form->label($model,'Street'); ?>
		<?php echo $form->textField($model,'Street',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Appartment'); ?>
		<?php echo $form->textField($model,'Appartment',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Zip'); ?>
		<?php echo $form->textField($model,'Zip',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Country'); ?>
		<?php echo $form->textField($model,'Country',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DHL_Office'); ?>
		<?php echo $form->textField($model,'DHL_Office',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Skype_ICQ'); ?>
		<?php echo $form->textField($model,'Skype_ICQ',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<!--
	<div class="row">
		<?php echo $form->label($model,'Scan_ID'); ?>
		<?php echo $form->textField($model,'Scan_ID',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Scan_Registration'); ?>
		<?php echo $form->textField($model,'Scan_Registration',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Scan_Agreement'); ?>
		<?php echo $form->textField($model,'Scan_Agreement',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'Start_Date'); ?>
		<?php echo $form->textField($model,'Start_Date',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Finish_Date'); ?>
		<?php echo $form->textField($model,'Finish_Date',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	-->
	<!--
	<div class="row">
		<?php echo $form->label($model,'Pay_Comment'); ?>
		<?php echo $form->textArea($model,'Pay_Comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Staff_Comment'); ?>
		<?php echo $form->textArea($model,'Staff_Comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>
	-->

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->