<?php
// Проверяем что нельзя получить не объявленную функцию
try{
	getfn('say');
}catch(bu\def\FnNotDefined $e){
	echo "Catched!";
}
---
Catched!