<?php
namespace bu\def{
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
	class BuDefException extends \Exception{}
	class CannotDef extends BuDefException{}
	class FnNotDefined extends BuDefException{}

}
namespace{
	use bu\def\Memo, bu\def\Call, bu\def\CannotDef;
	function def($name, $fn){
		if(function_exists($name)){
			if(!in_array($name, Memo::$wrappers))
				throw new CannotDef('Function '.$name.' already exists and it is not a wrapper');
		}else{
			Memo::$wrappers[] = $name;
			$ns = '';
			if(preg_match('@^(.*)\\\\([^\\\\]+)$@', $name, $m)){
				$ns = 'namespace '.$m[1].';';
				$fn_name = $m[2];
			}else{
				$fn_name = $name;
			}


			eval($ns.
			     'use bu\def\Memo, bu\def\Call, bu\def\FnNotDefined;'.
			     'function '.$fn_name.'(){ '.
			     'if(!isset(Memo::$fns["'.$name.'"]) or !Memo::$fns["'.$name.'"])'.
			     '	throw new FnNotDefined("Function '.$name.' haven`t body!b");'.
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
