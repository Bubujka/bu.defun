<?php
namespace bu\defun{
	class Memo{
		static $fns = array();
		static $wrappers = array();
		static $methods = array();
	}

	class Call{
		var $fn;
		var $args = array();
		function __invoke(){
			return call_user_func_array($this->fn,
						    func_num_args() ?  func_get_args() : $this->args);
		}
	}
}
namespace{
	use bu\defun\Memo, bu\defun\Call;
	function defun($name, $fn){
		if(function_exists($name)){
			if(!in_array($name, Memo::$wrappers))
				throw new Exception('Function '.$name.' already exists and it is not a wrapper');
		}else{
			Memo::$wrappers[] = $name;
			$ns = '';
			if(preg_match('@^(.*)\\\\([^\\\\]+)$@', $name, $m)){
				$ns = 'namespace '.$m[1].';';
				$name = $m[2];
			}
			eval($ns.
			     'use bu\defun\Memo, bu\defun\Call;'.
			     'function '.$name.'(){ '.
			     'if(!isset(Memo::$fns["'.$name.'"]) or !Memo::$fns["'.$name.'"])'.
			     '	throw new Exception("Function '.$name.' haven`t body!");'.
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
}
