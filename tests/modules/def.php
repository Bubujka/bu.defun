<?php
def("hello::world", function($what){
		echo "Hello, {$what}!";
	});

hello::world('waserd');
---
Hello, waserd!