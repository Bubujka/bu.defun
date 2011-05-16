<?php
// testing def_alias
def('one', function(){ echo 1; });
def_alias('one', 'two');
one();
two();
?>
---
11
