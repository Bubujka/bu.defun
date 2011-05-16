<?php
// testing namespace def
def('foo\bar\baz\hello', function(){ echo "Hello!"; });
foo\bar\baz\hello();
?>
---
Hello!
