<?php
bu\def\memcached_prefix('bu.def.tests');
defmd('sum', function($a, $b){
		echo '.';
		return $a+$b;
	});
echo sum(1,2)."\n";
echo sum(1,2)."\n";
echo sum(2,2)."\n";
bu\def\memcached_prefix('bu.def.tests2');
echo sum(1,2)."\n";
echo sum(1,2)."\n";
echo sum(2,2)."\n";
bu\def\memcached_prefix('bu.def.tests');
echo sum(1,2)."\n";
echo sum(2,2)."\n";
?>
---
.3
3
.4
.3
3
.4
3
4
