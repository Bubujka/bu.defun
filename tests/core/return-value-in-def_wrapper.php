<?php
// testing return value in wrap;
def('m2', function($i){ return $i * 2; });
echo m2(2);
def_wrapper('m2', function($call){ return $call() + 1; });
echo m2(2);
?>
---
45
