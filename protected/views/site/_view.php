<?php
$id = CHtml::encode($data['Id']);
$head = CHtml::encode($data['Header']);
$body = CHtml::encode($data['Body']);
$date = CHtml::encode($data['Date']);
echo "<div class='view news$id'>";
echo	"<h3>$head</h3>";
echo	"<div>$date</div>", '<br/>';
echo	"<div>$head</div>", '<br/>';
echo "<span style='border:1px solid black' id='$id' class='Hide'><b>Hide</b></span>";
echo "</div>";
?>