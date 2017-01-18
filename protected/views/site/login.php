<?php
	$this->pageTitle=Yii::app()->name . ' Login';
?>
<div class="form">
	<?php
		$form = $this->beginWidget(
			'CActiveForm', 
			array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array('validateOnSubmit'=>true,
				),
			));
	?>
	<div class="row">
		<?php
			echo $form->textField($model, 'username', array('placeholder'=>Yii::t('main-ui','Username')));
			echo $form->error($model, 'username');
		?>
	</div>
	<div class="row">
		<?php
			echo $form->passwordField($model,'password', array('placeholder'=>Yii::t('main-ui','Password')));
			echo $form->error($model,'password');
		?>
	</div>
	<div class="row rememberMe">
		<?php
			echo $form->checkBox($model,'rememberMe');
			echo $form->label($model,'rememberMe');
			echo $form->error($model,'rememberMe');
		?>
	</div>
	<div class="row buttons">
		<?php
			echo CHtml::submitButton(Yii::t('main-ui','Login'));
		?>
	</div>
	<?php
		$this->endWidget();
	?>
</div>