<?php

/* index.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

/* get svn version */
$rev = join('',file('work/version.txt'));
$mod = gmdate('r',filemtime('work/version.txt'));

$content = '
<h1>FreeBSD Ports Index</h1>
<p>Ports SVN repository version currently on this machine: '.trim($rev).'. Index was last generated '.$mod.'</p>
';
$categories = unserialize(join('',file('work/categories.txt')));
$ports = unserialize(join('',file('work/ports.txt')));
$col=0;
$content .= '<div><div class="col">';
$max = ceil(count($categories)/4);
foreach ($categories as $k=>$v) {
	if ($max>$col) {
		$col=0;
		$content .='</div><div class="col">';
	}
	$content .= '<div><a href="port.php/'.urlencode($k).'">'.$k.'</a> ('.count($ports[$k]).')</div>';
	++$col;
}
$content .= '</div>
</div>
<pre></pre>
';
include('output.php');

//EOF