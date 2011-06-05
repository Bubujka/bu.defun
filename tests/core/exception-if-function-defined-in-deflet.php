<?php
// testing FnNotDefined exception
try{
	deflet(function(){
			def('hello', function(){});
		});
	hello();
}catch(bu\def\FnNotDefined $e){
	echo 'catched!';
}
?>
---
catched!
