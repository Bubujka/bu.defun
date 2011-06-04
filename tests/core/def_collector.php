<?php
def_constructor('mk_user', 'name', 'age');
$one = mk_user('alex', 21);
$two = mk_user('sasha', 28);
foreach(array($one,$two) as $u){
	foreach($u as $k=>$v)
		echo $k.": ".$v."\n";
	echo "-\n";
}
---
name: alex
age: 21
-
name: sasha
age: 28
-