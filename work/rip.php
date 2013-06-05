<?php

/* rip.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

if(!defined('STDIN')) {
        echo 'Run from command line only.';
        exit();
}


function parsedate($v) {
	/* NEW header format should work */
	$x=explode(' ',trim($v));
	array_pop($x);
	array_pop($x);
	$tm = array_pop($x);
	$dt = array_pop($x);
	$test = strtotime($dt.' '.$tm);
	if ($test>0) {
		return(gmdate('r',$test));
	} else {
		return (' ');
	}
}
	
$categories = unserialize(join('',file('categories.txt')));
$ports = unserialize(join('',file('ports.txt')));

foreach ($categories as $p=>$lass) {
	$content = '<h1>FreeBSD Ports: Category &quot;'.htmlspecialchars($p).
		'&quot;</h1>
<p><a href="/FreeBSD-ports/index.php">Main Menu</a></p>
';
	ksort($ports[$p]);
	foreach ($ports[$p] as $k=>$v) {
		$path = '/usr/ports/'.$p.'/'.$k;
		if (!file_exists($path.'/pkg-descr')) {
			$desc = ' This ports comes with no description. ';
		} else {
			$desc = join('',file($path.'/pkg-descr'));
			$dr=explode("\n",$desc);
			foreach ($dr as $n=>$m) {
				if (strstr($m,'WWW:')) {
					$t=trim(str_replace('WWW:','',$m));
					$dr[$n]='WWW: '.
				'<a href="'.$t.'" target="_blank">'.$t.'</a>';
				}
			}
			$desc = join("\n",$dr);
		}
		$make = join('',file($path.'/Makefile'));
		$dr=explode("\n",$make);
		foreach ($dr as $n=>$m) {
			if (strstr($m,'$FreeBSD')) {
				$mod_date = parsedate($m);
			}
			if (strstr($m,'PORTVERSION=')) {
				$ds=explode('=',$m);
				$version = array_pop($ds);
				break;
			}
		}
		
		$content .= '<div><div class="hd"><div class="tit">'.$k.'</div>
<div class="date">'.$mod_date.'</div><div class="version">Ver: '.$version.
'</div></div>
<pre>'.$desc.'</pre>
</div>';
	}
	$fp = fopen('cache/'.$p.'.html','w');
	fwrite($fp,$content);
	fclose($fp);
	echo $p.' done.'."\n";
}



