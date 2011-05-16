<?php
// testing alias from namespace
def('foo\bar\baz\hello', function(){ echo "Hello!"; });
def_alias('foo\bar\baz\hello', 'hello');
hello();
?>
---
Hello!
