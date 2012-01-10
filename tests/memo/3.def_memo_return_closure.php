<?php
// def_memo возвращает замыкание. его можно использовать по своему усмотрению.
$v = def_memo('sum', function($a, $b){
		echo '.';
		return $a+$b;
	});
echo sum(1,2)."\n";
echo sum(1,3)."\n";
echo sum(1,2)."\n";
echo sum(2,1)."\n";

echo $v(4,5)."\n";
echo $v(1,2)."\n"; // использует ту же память что и sum()?
echo $v(4,5)."\n";
?>
---
.3
.4
3
.3
.9
3
9
