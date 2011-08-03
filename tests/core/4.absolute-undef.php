<?php
// При использовании undef - удаляется только последняя функция.
// Чтобы удалить всё - надо передать true вторым аргументом
for($i = 1; $i<5; $i++)
	def_printfer('say', "$i\n");

say();
undef('say');
say();
undef('say', true);
try{
	say();
}catch(Exception $e){
	echo "Catched!";
}
---
4
3
Catched!
