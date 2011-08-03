<?php
// Объявленную через bu.defun функцию всегда можно получить как
// замыкание с помощью getfn
def_printfer('say', "Hello!\n");
$fn = getfn('say');
$fn();
echo "\n";

// Проверим как будет реботать при переопределении
def_printfer('say', "Hello #2!\n");
$fn2 = getfn('say');
$fn();
$fn2();
echo "\n";

// А если ещё и разопределить функцию?..
undef('say');
$fn3 = getfn('say');
$fn();
$fn2();
$fn3();
---
Hello!

Hello!
Hello #2!

Hello!
Hello #2!
Hello!
