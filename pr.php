<?php

/* make.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

/* load ports array from cache */
$ports = unserialize(join('',file('work/ports.txt')));
$p=$_SERVER['REQUEST_URI'];
$x=explode('/',$p);
/* requested pr number */
$pr=intval(array_pop($x));
/* requested port */
$p=array_pop($x);
/* requested category */
$c=array_pop($x);

if ((!$ports[$c][$p])||($pr<1)) {
        $content = '<h1>OOpS! PR Not Found.</h1>
<p>The port page you requested, '.$pr.',  was not found.
</p>
<p><a href="/FreeBSD-ports/index.php">Return to previous page.</a></p>
';
        $title = 'OOpS';
} else {
	$content = '<h1>FreeBSD Ports: <a href="/FreeBSD-ports/make.php/'.$c.'/'.$p.'">'.$c.'/'.$p.'</a></h1>
<h2>Problem Report #'.$pr.'</h2>
';

	if (!file_exists('/b/ports/'.$pr)) {
		$content = '<p>File Not Found</p>
';
	} else {
		/* Load PR from GNATS database located at /b/ports 
		   edit to match your system */
		$report = join('',file('/b/ports/'.$pr));
		$report = htmlspecialchars($report,
			ENT_COMPAT|ENT_HTML5,'ISO-8859-1');
		$content .= '<pre>'.$report.'</pre>';
	}
}

include('output.php');

//EOF