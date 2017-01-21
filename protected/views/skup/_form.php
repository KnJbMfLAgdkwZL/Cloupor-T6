<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'skup-form',
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
		<?php echo $form->labelEx($model,'Merchandise',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Merchandise'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textArea($model,'Merchandise',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
		</div>
		<?php echo $form->error($model,'Merchandise'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Comment',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Comment'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textArea($model,'Comment',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
		</div>
		<?php echo $form->error($model,'Comment'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'No1',array('class' => 'col-lg-2 control-label')); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'No1',array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'No1'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'No2',array('class' => 'col-lg-2 control-label')); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'No2',array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'No2'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'No3',array('class' => 'col-lg-2 control-label')); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'No3',array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'No3'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model, 'Skupforever', array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Skup forever'))); ?>
		<div class="col-lg-10">
		<?php
			$status = array('No', 'Yes');
			echo CHtml::dropDownList('Skup[Skupforever]', $model['Skupforever'], $status,array('class'=>'form-control',));
		?>
		</div>
		<?php echo $form->error($model,'Status'); ?>
	</div>
	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui','Create') : Yii::t('main-ui','Save'), array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->