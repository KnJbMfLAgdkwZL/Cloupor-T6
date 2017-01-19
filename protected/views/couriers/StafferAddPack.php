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
	$form=$this->beginWidget('CActiveForm', array('id'=>'skup-form','enableAjaxValidation'=>false,));
?>
	<p class="note">
		<?= Yii::t('main-ui', 'Fields with'); ?>
		<span class="required">*</span>
		<?= Yii::t('main-ui', 'are required.'); ?>
	</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Date',array('label'=>Yii::t('main-ui','Date'))); ?>
		<?php echo $form->textField($model,'Date'); ?>
		<?php echo $form->error($model,'Date'); ?>
	</div>
	<div class="row">
	<?php
		echo $form->labelEx($model,'Courier',array('label'=>Yii::t('main-ui','Courier')));
		$list = Staffercoriers::model()->getAssocList();
		echo CHtml::dropDownList('Packs[Courier]', 0, $list);
		echo $form->error($model,'Courier');
	?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Track',array('label'=>Yii::t('main-ui','Track'))); ?>
		<?php echo $form->textField($model,'Track'); ?>
		<?php echo $form->error($model,'Track'); ?>
	</div>
	<div class="row">
		<?php
			echo $form->labelEx($model,'Skup_reShip',array('label'=>Yii::t('main-ui','Reship')));
			echo $form->textField($model,'Skup_reShip', array('placeholder'=>'Address reship if needed'));
			echo $form->error($model,'Skup_reShip');
		?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Comment',array('label'=>Yii::t('main-ui','Comment'))); ?>
		<?php echo $form->textField($model,'Comment'); ?>
		<?php echo $form->error($model,'Comment'); ?>
	</div>
	<div class="row">
		<label><?= Yii::t('main-ui', 'Goods'); ?></label>
		<div class="goods">
			<div>
				<input name="Goods[Merchandise][1]" id="Goods_Merchandise" type="text" placeholder='<?= Yii::t('main-ui', 'Merchandise'); ?>' maxlength="255"/>
				<input class="numOnly" name="Goods[Price][1]" id="Goods_Price1" type="text" placeholder='<?= Yii::t('main-ui', 'Price'); ?>' maxlength="255"/>
				<input class="numOnly" name="Goods[Count][1]" id="Goods_count1" type="text" placeholder='<?= Yii::t('main-ui', 'Count'); ?>' maxlength="255"/>
				<input name="Goods[Shop_link][1]" id="Goods_Shop_link" type="text" placeholder='<?= Yii::t('main-ui', 'Shop link'); ?>' maxlength="255"/>
			</div>
		</div>
		<div><?= Yii::t('main-ui', 'Total Sum'); ?>: <span id="Total">0</span>
		<?php
			$curency = array('Usd'=>'Usd', 'Eur'=>'Eur', 'Rub'=>'Rub');
			echo CHtml::dropDownList('Packs[Currency]', 0, $curency);
		?>
		</div>
		<span id='MoreMerchandise' style="border: 1px solid black">
			<?= Yii::t('main-ui', 'More Merchandise'); ?>
        </span>
	</div>
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
		'<div>'+
			'<input name="Goods[Merchandise][' + goodscount + ']" id="Goods_Merchandise" type="text" placeholder="<?= Yii::t('main-ui', 'Merchandise'); ?>" maxlength="255"/> '+
			'<input class="numOnly" name="Goods[Price][' + goodscount + ']" id="Goods_Price' + goodscount +'" type="text" placeholder="<?= Yii::t('main-ui', 'Price'); ?>" maxlength="255"/> '+
			'<input class="numOnly" name="Goods[Count][' + goodscount + ']" id="Goods_count' + goodscount +'" type="text" placeholder="<?= Yii::t('main-ui', 'Count'); ?>" maxlength="255"/> '+
			'<input name="Goods[Shop_link][' + goodscount + ']" id="Goods_Shop_link" type="text" placeholder="<?= Yii::t('main-ui', 'Shop link'); ?>" maxlength="255"/>'+
		'</div>';
		return str;
	}
</script>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui','Create') : Yii::t('main-ui','Save')); ?>
	</div>
<?php
	$this->endWidget();
?>
</div><!-- form -->