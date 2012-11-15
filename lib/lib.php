<?php
namespace bu\def{
  class Memo{
    static $fns = array();
    static $wrappers = array();
    static $named_wrappers = array();
    static $methods = array();
    static $catchers = array();
    static $modules = array();
    static $debug = false;
    static $prefix = "";
    static $memcached_static_cache = array();
  }

  class Module{
    static $fns = array();
    static function __callStatic($nm, $args){
      if(isset(static::$fns[$nm]))
        return call_user_func_array(static::$fns[$nm], $args);
    }
  }

  class Call{
    var $fn;
    var $name;
    var $args = array();
    function __invoke(){
      return call_user_func_array($this->fn,
        func_num_args() ?  func_get_args() : $this->args);
    }
  }

  class Signal extends \Exception{
    var $what;
    function __construct($what){
      $this->what = $what;
    }
  }

  class BuDefException extends \Exception{ 
  }
  class CannotDef extends BuDefException{
  }
  class FnNotDefined extends BuDefException{
  }
  class UncatchedSignalException extends BuDefException{
  }
  class ConfigException extends BuDefException{
  }

  function _make_prototype($ns, $fn_name, $name){
    Memo::$wrappers[] = $name;
    eval($ns.
      'use bu\def\Memo, bu\def\Call, bu\def\FnNotDefined;'.
      'function '.$fn_name.'(){ '.
      'if(!isset(Memo::$fns[\''.$name.'\']) or !Memo::$fns[\''.$name.'\'])'.
      '	throw new FnNotDefined(\'Function '.$name.' haven`t body!\');'.
      '$fn = current(Memo::$fns[\''.$name.'\']);'.
      '$fn->args = func_get_args();'.
      'return $fn();}');
  }

  function _push_fn($name, $fn){
    $call = new Call;
    $call->name = $name;
    $call->fn = $fn;

    if(!isset(Memo::$fns[$name]))
      Memo::$fns[$name] = array();

    Memo::$fns[$name][] = $call;
    end(Memo::$fns[$name]);
    return $fn;
  }

  function _with_wrapper($name, $fn){
		$old_fn = current(Memo::$fns[$name]);
    return _push_fn($name, function() use($old_fn, $fn){
      $args = func_get_args();
      $old_fn->args = $args;
      return $fn($old_fn);
    });
	}

  _make_prototype('', 'wrappers', 'wrappers');
  _push_fn('wrappers', function(){});

  function def($name, $fn){
    $name = Memo::$prefix.$name;

    if(strstr($name, '::') !== false){
      list($class_nm, $fn_nm) = explode('::', $name);
      if(!class_exists($class_nm)){
        eval("class $class_nm extends \bu\def\Module{}");
      }
      $class_nm::$fns[$fn_nm] = $fn;
      return;
    }

    if(function_exists($name)){
      if(!in_array($name, Memo::$wrappers))
        throw new CannotDef('Function '.$name.' already exists and it is not a wrapper');
    }else{
      $ns = '';
      if(preg_match('@^(.*)\\\\([^\\\\]+)$@', $name, $m)){
        $ns = 'namespace '.$m[1].';';
        $fn_name = $m[2];
      }else{
        $fn_name = $name;
      }
      _make_prototype($ns, $fn_name, $name);
    }
    $t = wrappers();
    if($t){
      $rfn = _push_fn($name, $fn);
      foreach(array_reverse(explode(' ', wrappers())) as $wrap_nm){
        if(!isset(Memo::$named_wrappers[$wrap_nm]))
          throw new CannotDef("Wrapper \"$wrap_nm\" is not exists!");
        $rfn = _with_wrapper($name, Memo::$named_wrappers[$wrap_nm]);
      }
      wrappers('');
      return $rfn;
    }
    return _push_fn($name, $fn);
  }
  def('def', function($name, $fn){
    return def($name, $fn);
  });
}
