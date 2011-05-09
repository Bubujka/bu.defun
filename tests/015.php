<?php
// testing namespace defun
defun('foo\bar\baz\hello', function(){ echo "Hello!"; });
foo\bar\baz\hello();
?>
---
Hello!
