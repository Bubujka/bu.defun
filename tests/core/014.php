<?php
// test def_converter
def_converter('down', 'up', function($s){return strtoupper($s);});
echo down_to_up('hello')."\n";
foreach(downs_to_ups(array('wor', 'ld')) as $v)
	echo $v."\n";
?>
---
HELLO
WOR
LD

