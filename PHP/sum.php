<?php 

function sum($numbers) {
	$sum = 0;
	foreach ($numbers as $num) {
		$sum += $num;
	}
	return $sum;
}
?>