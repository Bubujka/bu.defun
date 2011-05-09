#!/usr/bin/env php
<?php
require_once 'load.php';
def_printfer("puts","%s\n");


if(isset($argv[1])){
	defun('test_files', function() use($argv){
			return array('tests/'.$argv[1].'.php');
		});
}else{
	defun('test_files', function(){
			return glob('tests/*.php');
		});
}

defun('read_test', function($file){
		return explode("---\n", file_get_contents($file));
	});

defun('eval_output', function($src){
		file_put_contents('tmp.php', $src);
		return `php tmp.php`;
	});

defun('add_error', function($file, $eval_out, $result){
		puts("Error in file: {$file}");
		puts($eval_out);
		puts('------------------');
		puts($result);
		puts('');
	});

$correct = 0;
$total = 0;
$fail = 0;
foreach(test_files() as $file){
	$total++;
	list($src, $result) = read_test($file);
	$result = trim($result);
	$eval_out = trim(eval_output("<? require_once 'load.php'; ?>\n".$src));
	if($eval_out == $result){
		$correct++;
		echo '.';
	}else{
		add_error($file, $eval_out, $result);
		$fail++;
		echo '!';
	}
}
puts('');
puts("Correct: ".$correct);
puts("Fail: ".$fail);
puts("Total: ".$total);
unlink('tmp.php');
