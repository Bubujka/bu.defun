<?php
use bu\defun\Memo;
defun('undefun', function($name){
		array_pop(Memo::$fns[$name]);
		end(Memo::$fns[$name]);
	});

defun('funlet', function($fn){
		$fns = Memo::$fns;
		$return = $fn();
		Memo::$fns = $fns;

		return $return;
	});

defun('def_alias', function($orig, $dest){
		defun($dest, function() use($orig){
				$args = func_get_args();
				return call_user_func_array($orig, $args);
			});
	});

defun('def_wrap', function($name, $fn){
		$old_fn = current(Memo::$fns[$name]);
		defun($name,
		      function() use($old_fn, $fn){
			      $args = func_get_args();
			      $old_fn->args = $args;
			      return $fn($old_fn);
		      });
	});

def_alias('undefun', 'undef_wrap');

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

// Объявить функцию $name, которая просто вернёт $value.
defun('def_ret', function($name, $value){
		defun($name, function() use($value){
				return $value;
			});
	});

defun('def_text_inspector', function($fn){
		def_wrap($fn, function($call) use($fn){
				echo ">> Calling '{$fn}' function with arguments:\n";
				foreach($call->args as $arg)
					echo ">> - {$arg}\n";
				$r = $call();
				echo ">> return value is '{$r}'\n";
				return $r;
			});
	});