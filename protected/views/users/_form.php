<div class="form">
<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">
		<?= Yii::t('main-ui', 'Fields with'); ?>
		<span class="required">*</span>
		<?= Yii::t('main-ui', 'are required.'); ?>
	</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php
			echo $form->labelEx($model,'Login',array('label'=>Yii::t('main-ui', 'Login')));
			echo $form->textField($model,'Login',array('size'=>60,'maxlength'=>255));
			echo $form->error($model,'Login');
		?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model,'Password',array('label'=>Yii::t('main-ui', 'Password')));
			echo $form->textField($model,'Password',array('size'=>60,'maxlength'=>255));
			echo $form->error($model,'Password');
		?>
		<span id='GetNewPass' style="border: 1px solid black">
			<?= Yii::t('main-ui', 'Generate Password'); ?>
        </span>
		<script>
			$(document).ready(function ()
			{
				$('#GetNewPass').click(function ()
				{
					$( "input[name='Users[Password]']" ).val( RandomPassword() );
				});
			});
			function RandomPassword()
			{
				var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
				var string_length = 12;
				var randomstring = '';
				for (var i=0; i<string_length; i++)
				{
					var rnum = Math.floor(Math.random() * chars.length);
					randomstring += chars.substring(rnum, rnum + 1);
				}
				return randomstring;
			}
		</script>
	</div>
	<div class="row">
		<?php 
			echo $form->labelEx($model,'Role',array('label'=>Yii::t('main-ui', 'Role')));
			$list = UsersRoles::model()->getAssocList();
			echo CHtml::dropDownList('Users[Role]', $model['Role'], $list);
		?>
		<?php echo $form->error($model,'Role'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui', 'Create') : Yii::t('main-ui', 'Save')); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->