<?php
class Memo{
	static $fns = array();
}

class Call{
	var $fn;
	var $args = array();
	function __invoke(){
		return call_user_func_array($this->fn,
					    func_num_args() ?  func_get_args() : $this->args);
	}
}

function defun($name, $fn){
	if(function_exists($name)){
		if(!isset(Memo::$fns[$name]))
			throw new Exception('Function '.$name.' already exists and not a generic');
	}else{
		eval(
		'function '.$name.'(){ '.
		'$fn = current(Memo::$fns["'.$name.'"]);'.
		'$fn->args = func_get_args();'.
		'return $fn();}');
	}
	$call = new Call;
	$call->fn = $fn;

	if(!isset(Memo::$fns[$name]))
		Memo::$fns[$name] = array();

	Memo::$fns[$name][] = $call;
	end(Memo::$fns[$name]);
}
