<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'skup-form',
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
		<?php echo $form->labelEx($model,'Merchandise',array('label'=>Yii::t('main-ui', 'Merchandise'))); ?>
		<?php echo $form->textArea($model,'Merchandise',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Merchandise'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Comment',array('label'=>Yii::t('main-ui', 'Comment'))); ?>
		<?php echo $form->textArea($model,'Comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Comment'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'No1'); ?>
		<?php echo $form->textField($model,'No1'); ?>
		<?php echo $form->error($model,'No1'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'No2'); ?>
		<?php echo $form->textField($model,'No2'); ?>
		<?php echo $form->error($model,'No2'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'No3'); ?>
		<?php echo $form->textField($model,'No3'); ?>
		<?php echo $form->error($model,'No3'); ?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model, 'Skupforever', array('label'=>Yii::t('main-ui', 'Skup forever')));
			$status = array('No', 'Yes');
			echo CHtml::dropDownList('Skup[Skupforever]', $model['Skupforever'], $status);
			echo $form->error($model,'Status');
		?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui', 'Create') : Yii::t('main-ui','Save')); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->