<?php
defun('def_wrap', function($name, $fn){
		$old_fn = current(Memo::$fns[$name]);
		defun($name,
		      function() use($old_fn, $fn){
			      $args = func_get_args();
			      $old_fn->args = $args;
			      return $fn($old_fn);
		      });
	});

defun('unwrap',
      function($name){
	      array_pop(Memo::$fns[$name]);
	      end(Memo::$fns[$name]);
      });

defun('def_printfer', function($name, $tpl){
	defun($name, function() use($tpl){
		$args = func_get_args();
		array_unshift($args, $tpl);
		return call_user_func_array('printf', $args);
	});
});

defun('def_sprintfer', function($name, $tpl){
	defun($name, function() use($tpl){
		$args = func_get_args();
		array_unshift($args, $tpl);
		return call_user_func_array('sprintf', $args);
	});
});

defun('def_memo', function($name, $fn){
	defun($name, function() use($name, $fn){
		static $data = array(); 
		$args = func_get_args();
		$key = serialize($args);
		if(!isset($data[$name][$key]))
			$data[$name][$key] = call_user_func_array($fn, $args);
		return $data[$name][$key];
	});
});


defun('def_converter', function($from, $to, $fn){
	defun("{$from}_to_{$to}", $fn);
	defun("{$from}s_to_{$to}s", function($array) use ($fn){
		return array_map($fn, $array);
	});
});
