<?php
// testing Fn redefining after deflet
deflet(function(){
		def('hello', function(){});
	});
def('hello', function(){ echo "worked"; });
hello();
?>
---
worked
