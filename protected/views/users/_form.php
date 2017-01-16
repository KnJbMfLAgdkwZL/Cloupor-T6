<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Login'); ?>
		<?php echo $form->textField($model,'Login',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Login'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->textField($model,'Password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Password'); ?>
		<span id='GetNewPass' style="border: 1px solid black">
            Get New Pass
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
			echo $form->labelEx($model,'Role');
			$list = UsersRoles::model()->getAssocList();
			echo CHtml::dropDownList('Users[Role]', $model['Role'], $list);
		?>
		<?php echo $form->error($model,'Role'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->