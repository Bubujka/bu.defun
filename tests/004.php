<?php
// testing return value
defun('ret', function(){
	return 100;
});
echo ret();
?>
---
100
