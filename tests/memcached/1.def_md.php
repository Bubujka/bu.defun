<?php
bu\def\memcached_prefix('bu.def.tests');
defmd('sum', function($a, $b){
		echo '.';
		return $a+$b;
	});
echo sum(1,2)."\n";
echo sum(1,2)."\n";
flush_all();
echo sum(1,2)."\n";
echo sum(1,2)."\n";
?>
---
.3
3
.3
3
