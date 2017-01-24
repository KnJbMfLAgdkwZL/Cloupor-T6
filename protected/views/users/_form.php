<div class="form">
<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
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
		<?php echo $form->labelEx($model,'Login',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Login'))); ?>
			<div class="col-lg-10">
			<?php echo $form->textField($model,'Login',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
			</div>
			<?php echo $form->error($model,'Login'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Password',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Password'))); ?>
			<div class="col-lg-10">
			<?php echo $form->textField($model,'Password',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
			</div>
			<?php echo $form->error($model,'Password'); ?>
			<div class="col-lg-10 col-lg-offset-2">
				<span id='GetNewPass' class='btn btn-info btn-sm'>
					<?= Yii::t('main-ui', 'Generate Password'); ?>
				</span>
			</div>
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

	<div class="form-group">
		<?php echo $form->labelEx($model,'Role',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Role'))); ?>
		<div class="col-lg-10">
			<?php
			$list = UsersRoles::model()->getAssocList();
			echo CHtml::dropDownList('Users[Role]', $model['Role'], $list,array('class'=>'form-control',)); ?>
		</div>
		<?php echo $form->error($model,'Role'); ?>
	</div>



    <div class="form-group">
        <?php echo $form->labelEx($model,'Comments',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Comments'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textField($model,'Comments',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
        </div>
        <?php echo $form->error($model,'Comments'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'Requisites',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Requisites'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textField($model,'Requisites',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
        </div>
        <?php echo $form->error($model,'Requisites'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'Jabber',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Jabber'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textField($model,'Jabber',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
        </div>
        <?php echo $form->error($model,'Jabber'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'Wmid',array('class' => 'col-lg-2 control-label','label'=>Yii::t('main-ui', 'Wmid'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textField($model,'Wmid',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
        </div>
        <?php echo $form->error($model,'Wmid'); ?>
    </div>



	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui', 'Create') : Yii::t('main-ui', 'Save'),array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->