#!/usr/bin/env php
<?php
$times = 1000000;
if(isset($argv[1]))
  $times = (int)$argv[1];

require_once 'load.php';

function normal_function($n){
  return $n + 1;
}

def('bu_defun_function', function($n){
  return $n + 1;
});

$t = microtime(true);
for($i = 0; $i<=$times; $i++)
  normal_function($i);
$normal_time = microtime(true) - $t;

$t = microtime(true);
for($i = 0; $i<=$times; $i++)
  bu_defun_function($i);
$bu_defun_time = microtime(true) - $t;

echo "PHP version: ".phpversion()."\n";
echo "Normal vs bu.defun: $normal_time x $bu_defun_time\n";
echo "Bu.defun at least ".floor($bu_defun_time / $normal_time)." times slower than native php =( \n";
