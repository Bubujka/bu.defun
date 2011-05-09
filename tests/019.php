<?php
// testing FnNotDefined exception
try{
	funlet(function(){
			defun('hello', function(){});
		});
	hello();
}catch(bu\defun\FnNotDefined $e){
	echo 'catched!';
}
?>
---
catched!
