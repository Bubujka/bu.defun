<?php
// testing funlet
def_printfer("say", "one\n");
say();
funlet(function(){
		def_printfer("say", "two\n");
		say();
	});
say();
?>
---
one
two
one

