<?php
def_accessor('user');
if(is_null(user()))
	echo "null\n";
user('waserd');
echo user();
---
null
waserd
