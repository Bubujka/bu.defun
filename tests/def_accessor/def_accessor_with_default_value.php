<?php
def_accessor('user', 'waserd');
echo user()."\n";
user('bubujka');
echo user();
---
waserd
bubujka
