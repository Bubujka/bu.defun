<?php
// Возможно переопределить функцию def.
def('def', function($name, $fn){
        echo "Defining {$name}\n";
        bu\def\def($name, $fn);
});

def('hello', function(){
        echo "Hello, world!\n";
});
hello();
---
Defining hello
Hello, world!
