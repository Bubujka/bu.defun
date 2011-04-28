<?php
//testing redefining
defun('name', function(){ 
	echo "Waserd"; 
});
name();
echo "\n";
defun('name', function(){ 
	echo "Bubujka"; 
});
name();
?>
---
Waserd
Bubujka
