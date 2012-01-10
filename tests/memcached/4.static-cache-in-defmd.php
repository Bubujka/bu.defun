<?php
// defmd сохраняет все результаты в bu\def\Memo::$memcached_static_cache
// Это чтобы лишний раз не обращаться к memcached
bu\def\memcached_prefix('bu.def.tests');
defmd('test_md', function($r){
        echo '.';
        return ($r * 2)."\n";
});
echo test_md(1);
echo test_md(1);
echo test_md(2);
flush_md();
echo test_md(1);
echo test_md(2);
flush_all();
echo test_md(1);
echo test_md(1);
echo test_md(2);
?>
---
.2
2
.4
2
4
.2
2
.4
