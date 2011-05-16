<?php
// testing return value
def('ret', function(){
	return 100;
});
echo ret();
?>
---
100
