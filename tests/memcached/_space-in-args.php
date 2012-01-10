<?php
bu\def\memcached_prefix('bu.def.tests');
defmd('test_md', function($a){
		echo '.';
		return $a."\n";
	});
echo test_md(1, "a b");
echo test_md(1, "a b");
?>
---
.1
1
