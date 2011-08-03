<?php

def_sprintfer('a', "<a href='%s'>%s</a>");
def_sprintfer('img', "<img src='%s'>");

def('def_tag',function($name){
		def_sprintfer($name, "<{$name}>%s</{$name}>\n");
	});

foreach(array('p','div','html','head','body','title', 'h1') as $tag)
	def_tag($tag);

echo html(head(title('Hello, World!')).
          body(div(h1('Hello, World!')).
	       div(p("This is a page about world!").
	           a("http://world.com", img("http://world.com/logo.jpg")))));
---
<html><head><title>Hello, World!</title>
</head>
<body><div><h1>Hello, World!</h1>
</div>
<div><p>This is a page about world!</p>
<a href='http://world.com'><img src='http://world.com/logo.jpg'></a></div>
</body>
</html>
