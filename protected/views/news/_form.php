<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Header'); ?>
		<?php echo $form->textArea($model,'Header',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Header'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Body'); ?>
		<?php echo $form->textArea($model,'Body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Body'); ?>
	</div>

	<div class="row">
		<?php
			echo $form->labelEx($model,'OnlyFor');
			$list = array(2 => 'Support', 3 => 'Staffer');
			echo CHtml::dropDownList('News[OnlyFor]', $model['OnlyFor'], $list);
			echo $form->error($model,'OnlyFor');
		?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->