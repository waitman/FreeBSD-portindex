<?php

/* ini_set('memory_limit', '4000M'); */

/* port.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

$ports = unserialize(join('',file('work/ports.txt')));
$p=$_SERVER['REQUEST_URI'];
if (strstr($p,'?')) {
	$dx=explode('?',$p);
	$p=array_shift($dx);
	$page=array_pop($dx);
}

$x=explode('/',$p);
$p=array_pop($x);

if (count($ports[$p])<1) {
	$content = '<h1>OOpS! Category Not Found.</h1>
<p>The category you requested, '.htmlspecialchars($p).',  was not found.</p>
<p><a href="/FreeBSD-ports/index.php">Return to previous page.</a></p>
';
	$title = 'OOpS';
} else {
	if (($page!='')&&($page!='p0')) {
		/* int val safety */
		$page=intval(str_replace('p','',$page));
		$page='p'.$page;
		$p.='-'.$page;
	}
	if (!file_exists('work/cache/'.$p.'.html')) {
		/* this should only happen if somebody tinkers with 
		   the parameters */
		$content = '<h1>OOpS! Category Not Found.</h1>
<p>The category you requested, '.htmlspecialchars($p).',  was not found.</p>
<p><a href="/FreeBSD-ports/index.php">Return to previous page.</a></p>
';
	} else {
		$title = 'Category: '.$p;
		$content = join('',file('work/cache/'.$p.'.html'));
	}
}

include('output.php');

//EOF