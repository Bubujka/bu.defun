<?php
// При объявлении функций - возвращается замыкание. 
$fn = def('up', function($str){
        return strtoupper($str);
});

echo up('hello, world')."\n";
echo $fn('world, hello');
---
HELLO, WORLD
WORLD, HELLO
