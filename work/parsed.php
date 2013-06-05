<?php

/* parsed.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
   Read directory structure under /usr/ports and store in database
*/

if(!defined('STDIN')) {
	echo 'Run from command line only.';
	exit();
}


$d=`find /usr/ports/ -type d | grep -v \.svn | grep -v distfiles | grep -v packages`;

$x=explode("\n",$d);

$categories = array();
$ports = array();

foreach ($x as $v) {
	$d=explode('/',$v);
	for ($i=0;$i<3;$i++) array_shift($d);	/* strip /usr/ports */
	if (count($d)==1) {			/* port category */
		$port=array_pop($d);
		if ($port!='')
			$categories[$port]=true;
	} else {
		if (count($d)==2) {		/* port name */
			$ports[$d[0]][$d[1]]=true;
		}
	}	
}

ksort($categories);

/* remove Keywords, Mk, Tool, Templates */
for ($i=0;$i<4;$i++) array_shift($categories);

/* write categories */
$fp=fopen('categories.txt','w');
fwrite($fp,serialize($categories));
fclose($fp);

/* write ports */
ksort($ports);
$fp=fopen('ports.txt','w');
fwrite($fp,serialize($ports));
fclose($fp);
	

