#!/usr/bin/env php
<?php
require_once 'load.php';
def_printfer("puts","%s\n");

def('test_dirs', function(){
		return glob('tests/*/');
	});

def('read_test', function($file){
		return explode("---\n", file_get_contents($file));
	});

def('eval_output', function($src){
		file_put_contents('tmp.php', $src);
		return `php tmp.php`;
	});

def('add_error', function($file, $eval_out, $result){
		puts("Error in file: {$file}");
		puts($eval_out);
		puts('------------------');
		puts($result);
		puts('');
	});

def('test_files', function($dir){
		return glob($dir.'*.php');
	});

$correct = 0;
$total = 0;
$fail = 0;
foreach(test_dirs() as $dir){
	$prefix = ""; $suffix = "";
	if(file_exists($dir.'prerequisite'))
		if(trim(eval_output(file_get_contents($dir.'prerequisite'))) != 'ok')
			continue;

	if(file_exists($dir.'prefix'))
		$prefix = file_get_contents($dir.'prefix');
	if(file_exists($dir.'suffix'))
		$suffix = file_get_contents($dir.'suffix');
	foreach(test_files($dir) as $file){
		$total++;
		list($src, $result) = read_test($file);
		$result = trim($result);
		$eval_out = trim(eval_output($prefix.$src.$suffix));
		if($eval_out == $result){
			$correct++;
			echo '.';
		}else{
			add_error($file, $eval_out, $result);
			$fail++;
			echo '!';
		}
	}
}
puts('');
puts("Correct: ".$correct);
puts("Fail: ".$fail);
puts("Total: ".$total);
unlink('tmp.php');
