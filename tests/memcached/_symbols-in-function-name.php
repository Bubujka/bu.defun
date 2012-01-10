<?php
bu\def\memcached_prefix('bu.def.tests');
defmd('foo\bar', function(){ echo '.'; return "1\n"; });
defmd('foo::bar', function(){ echo '.'; return "2\n"; });
echo foo\bar();
echo foo\bar();
echo foo::bar();
echo foo::bar();
?>
---
.1
1
.2
2
