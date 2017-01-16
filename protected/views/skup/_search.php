<?php
/* @var $this SkupController */
/* @var $model Skup */
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
		<?php echo $form->label($model,'Goods'); ?>
		<?php echo $form->textArea($model,'Goods',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Comment'); ?>
		<?php echo $form->textArea($model,'Comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'No1'); ?>
		<?php echo $form->textField($model,'No1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'No2'); ?>
		<?php echo $form->textField($model,'No2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'No3'); ?>
		<?php echo $form->textField($model,'No3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Skupforever'); ?>
		<?php echo $form->textField($model,'Skupforever'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->