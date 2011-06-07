<?php
def_md('sum',
       5,
       function($a, $b){
	       echo ".";
	       return $a+$b;
       },
       function($fname, $args){
	       return "{$fname}:".implode('-', $args);
       });

echo sum(1,2)."\n";
echo sum(1,2)."\n";
echo bu\def\memcached()->get('sum:1-2')."\n";

flush_md();
echo bu\def\memcached()->get('sum:1-2')."\n";
echo sum(1,2)."\n";
echo sum(1,2)."\n";
?>
---
.3
3
3

.3
3
