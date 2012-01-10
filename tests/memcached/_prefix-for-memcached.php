<?php
try{
        defmd('test_md', function(){});
}catch(bu\def\ConfigException $e){
        echo 'catched';
}
?>
---
catched
