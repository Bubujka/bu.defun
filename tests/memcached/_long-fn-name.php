<?php
bu\def\memcached_prefix('bu.def.tests');
$nm = str_repeat("a", 500);
defmd($nm, function($a){ echo '.'; return "$a\n"; });
echo call_user_func_array($nm, array(1));
echo call_user_func_array($nm, array(1));
echo call_user_func_array($nm, array(2));

?>
---
.1
1
.2
