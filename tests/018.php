<?php
// testing CannotDefun exception
try{
	defun('print_r', function(){});
}catch(bu\defun\CannotDefun $e){
	echo 'catched!';
}
?>
---
catched!
