<?php
// Врапперы можно объявить заранее и оборачивать функции прямо группой.
def_wrp('user', function($fn){
  echo "Checking for user\n";
  return $fn();
});

def_wrp('admin', function($fn){
  echo "Checking for admin\n";
  return $fn();
});

def_wrp('uppercase', function($fn){
  return strtoupper($fn());
});

def('test_1', function($t){
  echo "test 1\n";
  return $t."\n";
});

wrappers('user uppercase');
def('test_2', function($t){
  echo "test 2\n";
  return $t."\n";
});

def('test_3', function($t){
  echo "test 3\n";
  return $t."\n";
});
echo test_1('one');
echo test_2('two');
echo test_3('three');
---
test 1
one
Checking for user
test 2
TWO
test 3
three
