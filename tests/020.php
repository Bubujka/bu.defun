<?php
// testing Fn redefining after funlet
funlet(function(){
		defun('hello', function(){});
	});
defun('hello', function(){ echo "worked"; });
hello();
?>
---
worked
