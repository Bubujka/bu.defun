<?php
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
