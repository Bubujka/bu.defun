<?php
// testing def_alias
defun('one', function(){ echo 1; });
def_alias('one', 'two');
one();
two();
?>
---
11
