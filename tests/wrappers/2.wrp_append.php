<?php
// Врапперы суммируются при вызове wrp
foreach(array(1,2,3,4) as $v)
  def_wrp('wrp_'.$v, function($fn) use($v){
    echo $v;
    return $fn();
  });

wrp('wrp_1 wrp_4');
wrp('wrp_3');
wrp('wrp_2');
def('testing', function($arg){
  return strtoupper($arg);
});

echo testing("hello!");
---
1432HELLO!
