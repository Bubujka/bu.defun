<?php
# testing def_state_fns
$is_user = false;
def_state_fns('is_user', 'is_guest',
	      function($v){ global $is_user;
		      $is_user = $v;
	      },
	      function(){ global $is_user;
		      return $is_user;
	      });

$pr = function(){
	$tf = function($v){ echo ($v ? 'true' : 'false')."\n";};
	$tf(is_user());
	$tf(is_guest());
};
//default state
$pr();

//inverse state
is_user(true);
$pr();

//set over is_guest();
is_guest(true);
$pr();

?>
---
false
true
true
false
false
true