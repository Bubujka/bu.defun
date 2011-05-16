<?php
// testing FnNotDefined exception
try{
	funlet(function(){
			def('hello', function(){});
		});
	hello();
}catch(bu\def\FnNotDefined $e){
	echo 'catched!';
}
?>
---
catched!
