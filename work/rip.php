<?php

$max_page = 500;

/* ini_set('memory_limit', '4000M'); */

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
	$content = '<h1>FreeBSD Ports Index: Category &quot;'.htmlspecialchars($p).
		'&quot; ('.count($ports[$p]).')</h1>
<p><a href="/FreeBSD-ports/index.php">Main Menu</a></p>
';

	/* case sort */
	$case = array();
	foreach ($ports[$p] as $l=>$m) {
		$case[strtolower($l)]=$l;
	}
	ksort($case);

	$pages = ceil(count($ports[$p])/$max_page);

	$pc=0;
	$col=0;
	$t_content='';

	foreach ($case as $ll=>$k) {

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
				} else {
					$dr[$n]=htmlspecialchars($m,
					 ENT_COMPAT|ENT_HTML5,'ISO-8859-1');
				}
			}
			$desc = join("\n",$dr);
			$make = join('',file($path.'/Makefile'));
			$dr=explode("\n",$make);
			$rev=''; /* PORT REVISION */
			$version=''; /* PORT VERSION */
			foreach ($dr as $n=>$m) {
				if (strstr($m,'$FreeBSD')) {
					$mod_date = parsedate($m);
				}
				if (($version=='') &&
					(strstr($m,'PORTVERSION='))) {
					$ds=explode('=',$m);
					$version = array_pop($ds);
				}
				if (strstr($m,'PORTREVISION=')) {
					$ds=explode('=',$m);
					$rev = '-R#'.trim(array_pop($ds));
				}
			}
		}
		$make_link = '<small><a href="/FreeBSD-ports/make.php/'.$p.'/'.$k.'">'.$k.' port info</a></small>';
		/* check lint cache dir exists */
		if (!file_exists('cache/lint/'.$p)) mkdir('cache/lint/'.$p);
		$do_lint=true;
		if (@file_exists('cache/lint/'.$p.'/ver-'.$k)) {
			$chk_lint=join('',file('cache/lint/'.$p.'/ver-'.$k));
			if ($chk_lint==$version.'-'.$rev) {
				$do_lint=false;
			}
		}
		/* first run will take forever but we cache results 
		   for future runs */
		if ($do_lint) {
			/* use portlint from ports: ports-mgmt/portlint */
			$lint =`portlint /usr/ports/$p/$k`;
			$fp=fopen('cache/lint/'.$p.'/lint-'.$p.'-'.$k.'.txt','w');
			fwrite($fp,$lint);
			fclose($fp);
			/* record the version */
			$fp=fopen('cache/lint/'.$p.'/ver-'.$k,'w');
			fwrite($fp,$version.'-'.$rev);
			fclose($fp);
		}
		$t_content .= '<div><div class="hd"><div class="tit">'.$k.'</div>
<div class="date">'.$mod_date.'</div><div class="version">Ver: '.$version.$rev.
'<br />'.$make_link.'</div></div>
<pre>'.$desc.'</pre>
</div>';
		++$col;
		if ($col>$max_page) {
			/* calculate page header */
			$ph=array();
			for ($i=0;$i<$pages;$i++) {
				$sty='';
				if ($pc==$i) $sty='y'; /* highlight current page */
				$p_link='';
				if ($i>0) $plink='?p'.$i;
				$ph[$i]='<div class="page'.$sty.'"><a href="/FreeBSD-ports/port.php/'.$p.'?p'.$i.'">'.$p.' ('.($i+1).')</a></div>';
			}
			$page_header = '<div class="ph">'.join('',$ph).'</div><div class="br"></div>';
			$this_page = $content.$page_header.$t_content.$page_header;
			/* if page is zero use port name as filename, 
				otherwise add p# to filename */
			$p_link='';
			if ($pc>0) $p_link='-p'.$pc;
			$fp = fopen('cache/'.$p.$p_link.'.html','w');
			fwrite($fp,$this_page);
			fclose($fp);
			echo $p.$p_link.' done.'."\n";
			++$pc;		/* increment page number */
			$col=0;		/* reset counter */
			$t_content='';
		}
	}
	/* downside is we have to do it again for leftovers */
	if ($col>0) {
		if ($pages>1) {
			$ph=array();
			for ($i=0;$i<$pages;$i++) {
				$sty='';
				if ($pc==$i) $sty='y'; /* highlight current page */
				$p_link='';
				if ($i>0) $plink='?p'.$i;
				$ph[$i]='<div class="page'.$sty.'"><a href="/FreeBSD-ports/port.php/'.$p.'?p'.$i.'">'.$p.' ('.($i+1).')</a></div>';
			}	
			$page_header = '<div class="ph">'.join('',$ph).'</div><div class="br"></div>';
			$this_page = $content.$page_header.$t_content.$page_header;
		} else {
			$this_page = $content.$t_content;
		}
		/* if page is zero use port name as filename, 
			otherwise add p# to filename */
		$p_link='';
		if ($pc>0) $p_link='-p'.$pc;
		$fp = fopen('cache/'.$p.$p_link.'.html','w');
		fwrite($fp,$this_page);
		fclose($fp);
		echo $p.$p_link.' done.'."\n";
		++$pc;		/* increment page number */
		$col=0;		/* reset counter */
	
	}
}

//EOF
