<?php
// testing Fn redefining after funlet
funlet(function(){
		def('hello', function(){});
	});
def('hello', function(){ echo "worked"; });
hello();
?>
---
worked
