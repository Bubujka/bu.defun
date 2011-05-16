<?php
// testing deflet
def_printfer("say", "one\n");
say();
deflet(function(){
		def_printfer("say", "two\n");
		say();
	});
say();
?>
---
one
two
one

