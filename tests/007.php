<?php
// testing undef
def('say', function(){ echo "one\n"; });
say();
def('say', function(){ echo "two\n"; });
say();
undef('say');
say();
?>
---
one
two
one
