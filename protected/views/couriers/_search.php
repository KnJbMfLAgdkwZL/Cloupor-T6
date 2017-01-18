<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id',array('label'=>Yii::t('main-ui','Id'))); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Name',array('label'=>Yii::t('main-ui','Name'))); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Lastname',array('label'=>Yii::t('main-ui','Lastname'))); ?>
		<?php echo $form->textField($model,'Lastname',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php 
			echo $form->label($model,'Support',array('label'=>Yii::t('main-ui','Support')));
			$list = Users::model()->getAssocList(2);
			echo CHtml::dropDownList('Couriers[Support]', $model['Support'], $list);
		?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Street',array('label'=>Yii::t('main-ui','Street'))); ?>
		<?php echo $form->textField($model,'Street',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Appartment',array('label'=>Yii::t('main-ui','Appartment'))); ?>
		<?php echo $form->textField($model,'Appartment',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Zip',array('label'=>Yii::t('main-ui','Zip'))); ?>
		<?php echo $form->textField($model,'Zip',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'City',array('label'=>Yii::t('main-ui','City'))); ?>
		<?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Country',array('label'=>Yii::t('main-ui','Country'))); ?>
		<?php echo $form->textField($model,'Country',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'DHL_Office',array('label'=>Yii::t('main-ui','DHL Office'))); ?>
		<?php echo $form->textField($model,'DHL_Office',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Email',array('label'=>Yii::t('main-ui','Email'))); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Skype_ICQ',array('label'=>Yii::t('main-ui','Skype/ICQ'))); ?>
		<?php echo $form->textField($model,'Skype_ICQ',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'Phone',array('label'=>Yii::t('main-ui','Phone'))); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>
	<div class="row">
		<?php
			echo $form->label($model,'Status',array('label'=>Yii::t('main-ui','Status')));
			$list = array('New', 'Test', 'Active','Problem', 'Rat', 'Veteran');
			echo CHtml::dropDownList('Couriers[Status]', $model['Support'], $list);
		?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('main-ui','Search')); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- search-form -->