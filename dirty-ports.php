<?php
/* Not Used */
exit();

/* dirty-ports.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

$content = '
<h1>FreeBSD Ports Index - The Dirty Ports List</h1>
<p><a href="/FreeBSD/index.php">Main Menu</a></p>
';
$categories = unserialize(join('',file('work/categories.txt')));
$ports = unserialize(join('',file('work/ports.txt')));
$content .= '<p>The following list of ports either fail portlint, or portlint reports warnings. Please note, this does <strong>*not*</strong> mean the port has a bug or is broken. Instead, the port could possibly use some updating. In most cases the warnings are caused by an old-style port header, or extra space in the file.  Usually this is because the port was originally written before an update to port methods. The issues do <strong>*not*</strong> necessarily effect the compiled code which runs on your machine. The authors of the portlint tool strive to make a useful tool, however it is not totally pefect, especially when parsing the more complicated ports - in which &quot;false negatives&quot; may be reported. The portlint tool can be used to help the port maker create a port which complies with the standards detailed in the <a href="http://www.freebsd.org/doc/en/books/porters-handbook/">FreeBSD Porter&apos;s Handbook</a>.</p>';

$dirty = unserialize(join('',file('work/cache/dirty.txt')));
ksort($dirty);
foreach ($dirty as $k=>$v) {
	$content .= '<h2>'.$k.'</h2><ul>';
	ksort($v);
	foreach ($v as $l=>$m) {
		$content .= '<li><a href="make.php/'.urlencode($k).'/'.urlencode($l).'">'.$l.'</a></li>';
	}
	$content .= '</ul>';
}

include('output.php');

//EOF