<?php

/* index.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

$content = '
<h1>FreeBSD Ports</h1>
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

