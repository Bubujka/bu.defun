<?php
// testing CannotDef exception
try{
	def('print_r', function(){});
}catch(bu\def\CannotDef $e){
	echo 'catched!';
}
?>
---
catched!
