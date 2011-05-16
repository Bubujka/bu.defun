<?php
// testing arg pass to $call
def('m2', function($i){ return $i * 2; });
def_wrap('m2', function($call){ return $call(3); });
echo m2(2);
?>
---
6
