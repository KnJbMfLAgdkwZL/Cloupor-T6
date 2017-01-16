<div class="view">
	<?php
	$id = CHtml::encode($data['Id']);
	$head = CHtml::encode($data['Header']);
	$body = CHtml::encode($data['Body']);
	$date = CHtml::encode($data['Date']);
	echo "<h3>$head</h3>";
	echo "<div>$date</div>";
	echo "<div>$head</div>";
	echo "<span id='$id' class='Hide'>Hide</span>";
	?>
</div>