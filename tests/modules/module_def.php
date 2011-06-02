<?php
module('foo', function(){
		def('one', function(){echo 1;});
		def('two', function(){echo 2;});
		def('three', function(){echo 3;});
		def_printfer('hello', 'Hello, %s');
	});

foo::one();
foo::two();
foo::three();
foo::hello('waserd');
---
123Hello, waserd