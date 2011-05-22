<?php
//testing redefining
def('name', function(){ 
	echo "Waserd"; 
});
name();
echo "\n";
def('name', function(){ 
	echo "Bubujka"; 
});
name();
?>
---
Waserd
Bubujka
