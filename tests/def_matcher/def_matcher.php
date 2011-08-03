<?php
// def_matcher - объявляет функцию, которая сопоставляет свой аргумент с
// регулярным выражением
echo (int)function_exists('is_az');

def_matcher('is_az', '/^[a-z]+$/');

echo (int)function_exists('is_az');
foreach(array('', '1', 'a2', 'E', '_') as $v)
	echo (int)is_az($v);

foreach(array('a', 'qwerty') as $v)
	echo (int)is_az($v);

---
010000011
