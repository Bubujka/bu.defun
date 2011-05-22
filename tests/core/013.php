<?php
// testing def_memo
def_memo('sum', function($a, $b){
		echo '.';
		return $a+$b;
	});
echo sum(1,2)."\n";
echo sum(1,3)."\n";
echo sum(1,2)."\n";
echo sum(2,1);
?>
---
.3
.4
3
.3
