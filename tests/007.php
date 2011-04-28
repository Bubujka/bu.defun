<?php
// testing undefun
defun('say', function(){ echo "one\n"; });
say();
defun('say', function(){ echo "two\n"; });
say();
undefun('say');
say();
?>
---
one
two
one

