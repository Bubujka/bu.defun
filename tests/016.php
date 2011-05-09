<?php
// testing alias from namespace
defun('foo\bar\baz\hello', function(){ echo "Hello!"; });
def_alias('foo\bar\baz\hello', 'hello');
hello();
?>
---
Hello!
