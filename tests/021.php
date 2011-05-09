<?php
defun('dump', function($args){
		echo implode('-', $args);
	});
defun('throw_args', function($v1, $v2, $v3){
		dump(args());
	});

throw_args(4, 5, 6);
?>
---
4-5-6