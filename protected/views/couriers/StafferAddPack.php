<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
    $(document).ready(function ()
    {
		$("input[name='Packs[Date]']").datepicker();
    });
</script>
<h1><?= Yii::t('main-ui', 'Staffer, Add Pack'); ?></h1>
<div class="form">
<?php
	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'skup-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal'),
	));
?>
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
		<?php echo $form->labelEx($model,'Date',array('class'=>'col-lg-2 control-label','label'=>Yii::t('main-ui','Date'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Date',array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'Date'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Courier',array('class'=>'col-lg-2 control-label','label'=>Yii::t('main-ui','Courier'))); ?>
		<div class="col-lg-10">
		<?php
			$list = Staffercoriers::model()->getAssocList();
			echo CHtml::dropDownList('Packs[Courier]', 0, $list,array('class'=>'form-control'));
		?>
		</div>
		<?php echo $form->error($model,'Courier'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Track',array('class'=>'col-lg-2 control-label','label'=>Yii::t('main-ui','Track'))); ?>
		<div class="col-lg-10"><?php echo $form->textField($model,'Track',array('class'=>'form-control')); ?></div>
		<?php echo $form->error($model,'Track'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Skup_reShip',array('class'=>'col-lg-2 control-label','label'=>Yii::t('main-ui','Reship'))); ?>
		<div class="col-lg-10">
		<?php echo $form->textField($model,'Skup_reShip', array('class'=>'form-control','placeholder'=>'Address reship if needed')); ?>
		</div>
		<?php echo $form->error($model,'Skup_reShip'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Comment',array('class'=>'col-lg-2 control-label','label'=>Yii::t('main-ui','Comment'))); ?>
		<div class="col-lg-10">
			<?php echo $form->textField($model,'Comment',array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'Comment'); ?>
	</div>

	<div class="form-group">
		<label class='col-lg-2 control-label'><?= Yii::t('main-ui', 'Goods'); ?></label>
		
		<div class="col-lg-10">
			<span id='MoreMerchandise' class="btn btn-info btn-sm">
				<?= Yii::t('main-ui', 'More Merchandise'); ?>
			</span>
		</div>

		<br/>
		<br/>
		<div class="goods">
			<label class='col-lg-2 control-label'></label>
			<div class="col-lg-10">
				<input class='form-control' name="Goods[Merchandise][1]" id="Goods_Merchandise" type="text" placeholder='<?= Yii::t('main-ui', 'Merchandise'); ?>' maxlength="255"/>
				<input class="form-control numOnly" name="Goods[Price][1]" id="Goods_Price1" type="text" placeholder='<?= Yii::t('main-ui', 'Price'); ?>' maxlength="255"/>
				<input class="form-control numOnly" name="Goods[Count][1]" id="Goods_count1" type="text" placeholder='<?= Yii::t('main-ui', 'Count'); ?>' maxlength="255"/>
				<input class="form-control" name="Goods[Shop_link][1]" id="Goods_Shop_link" type="text" placeholder='<?= Yii::t('main-ui', 'Shop link'); ?>' maxlength="255"/>
			</div>
		</div>
		<style>
		.goods input
		{
			width: 150px;
			display: inline;
		}
		#Total
		{
			display: inline-block;
			width: 100px;
		}
		.shortelem
		{
			display: inline;
			width: 100px;
		}
		</style>
	</div>
	<div class="form-group">
		<label class='col-lg-2 control-label'><?= Yii::t('main-ui', 'Total Sum'); ?>: </label>
		<div class="col-lg-10">
			<span class='form-control' id="Total">0</span>
			<?php
				$curency = array('Usd'=>'Usd', 'Eur'=>'Eur', 'Rub'=>'Rub');
				echo CHtml::dropDownList('Packs[Currency]', 0, $curency,array('class'=>'form-control shortelem'));
			?>
		</div>
	</div>
	<!--
	<div class="col-lg-10 col-lg-offset-9">
		<span id='MoreMerchandise' class="btn btn-info btn-sm">
			<?= Yii::t('main-ui', 'More Merchandise'); ?>
		</span>
	</div>
	-->
<script>
	var goodscount = 1;
	$(document).ready(function ()
	{
		$('#MoreMerchandise').click(function()
		{
			$( ".goods" ).append( AddMoreGoods() );
		});
		$(".numOnly").live("keyup", function()
		{
			var str = $(this).val().replace(/[^0-9\.]/g, '');
			$(this).val( str );
			GetTotal();
		});
	});
	function GetTotal()
	{
		var sum = 0;
		for(var i=1; i<=goodscount; i++)
		{
			var price = $("#Goods_Price" + i).val();
			var count = $("#Goods_count" + i).val();
			sum += price * count;
		}
		$("#Total").text(sum);
	}
	function AddMoreGoods()
	{
		goodscount++;
		var str = 
		'<label class="col-lg-2 control-label"></label><div class="col-lg-10">'+
			'<input class="form-control" name="Goods[Merchandise][' + goodscount + ']" id="Goods_Merchandise" type="text" placeholder="<?= Yii::t('main-ui', 'Merchandise'); ?>" maxlength="255"/> '+
			'<input class="form-control numOnly" name="Goods[Price][' + goodscount + ']" id="Goods_Price' + goodscount +'" type="text" placeholder="<?= Yii::t('main-ui', 'Price'); ?>" maxlength="255"/> '+
			'<input class="form-control numOnly" name="Goods[Count][' + goodscount + ']" id="Goods_count' + goodscount +'" type="text" placeholder="<?= Yii::t('main-ui', 'Count'); ?>" maxlength="255"/> '+
			'<input class="form-control" name="Goods[Shop_link][' + goodscount + ']" id="Goods_Shop_link" type="text" placeholder="<?= Yii::t('main-ui', 'Shop link'); ?>" maxlength="255"/>'+
		'</div>';
		return str;
	}
</script>
	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui','Create') : Yii::t('main-ui','Save'), array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
<?php
	$this->endWidget();
?>
</div><!-- form -->