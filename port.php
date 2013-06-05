<?php

/* port.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

$ports = unserialize(join('',file('work/ports.txt')));
$p=$_SERVER['REQUEST_URI'];
$x=explode('/',$p);
$p=array_pop($x);

if (count($ports[$p])<1) {
	$content = '<h1>OOpS! Category Not Found.</h1>
<p>The category you requested, '.htmlspecialchars($p).',  was not found.</p>
<p><a href="/FreeBSD-ports/index.php">Return to previous page.</a></p>
';
	$title = 'OOpS';
} else {
	$title = 'Category: '.$p;
	$content = join('',file('work/cache/'.$p.'.html'));
}

include('output.php');

