<?php
// testing def_sprintfer
def_sprintfer('h1', '<h1>%s</h1>');
$v = h1('hello!');
echo ">".$v."<";
?>
---
><h1>hello!</h1><
