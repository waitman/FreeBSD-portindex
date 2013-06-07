<?php

/* make.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

$ports = unserialize(join('',file('work/ports.txt')));
$p=$_SERVER['REQUEST_URI'];
$x=explode('/',$p);
$p=array_pop($x);
$c=array_pop($x);

if (!$ports[$c][$p]) {
        $content = '<h1>OOpS! Port Not Found.</h1>
<p>The port page you requested, '.htmlspecialchars($c.'/'.$p).',  was not found.</p>
<p><a href="/FreeBSD-ports/index.php">Return to previous page.</a></p>
';
        $title = 'OOpS';
} else {
	$path = '/usr/ports/'.$c.'/'.$p;
	if (!file_exists($path.'/Makefile')) {
		$make = 'This port does not come with a Makefile.';
	} else {
		/* load portlint cache */
		if (file_exists('work/cache/lint/'.$c.'/lint-'.$c.'-'.$p.'.txt')) {
			$lint = '<h2>Portlint Output</h2>
<p><small><em>If you are considering using this as an example Makefile, 
please read the portlint output, below.</em></small></p>
<pre>'.join('',file('work/cache/lint/'.$c.'/lint-'.$c.'-'.$p.'.txt')).'</pre><hr />';
		} else {
			$lint = '';
		}
		$make = join('',file($path.'/Makefile'));
		/* escape */
		$make = htmlspecialchars($make,
			ENT_COMPAT|ENT_HTML5,'ISO-8859-1');
	}
	$content = '<h1>FreeBSD Ports: <a href="/FreeBSD-ports/port.php/'.
		urlencode($c).'">'.htmlspecialchars($c).'</a>/'.
		htmlspecialchars($p).'</h1><p><a href="/FreeBSD-ports/index.php">Main Menu</a></p>';
	$content.= '<hr /><h2>Makefile:</h2><pre>'.$make.'</pre><hr />'.$lint.
		'<h2>Associated PR from GNATS:</h2><br />
<table border="1" cellspacing="0" cellpadding="3" width="1000" id="prx">
<tr class="hi"><td><strong>Status</strong></td>
<td><strong>Date</strong></td>
<td><strong>Last Activity</strong></td>
<td><strong>PR</strong></td>
<td><strong>Who</strong></td>
<td><strong>Desc</strong></td>
<td><strong>Number of Messages</strong></td></tr>
';

	/* open PR database and fetch associated problem reports
	   this file is installed by ports: ports-mgmt/prhistory */
	$db = new SQLite3('/var/db/ports-pr.db');
	$sql = "SELECT * FROM pr WHERE desc LIKE '%%".$c.'/'.$p."%%' ORDER BY postdate DESC";
	$res = $db->query($sql);
	while ($row = $res->fetchArray()) {
		$content .= '<tr><td>'.$row['status'].' </td>
<td nowrap="nowrap">'.$row['postdate'].' </td>
<td nowrap="nowrap">'.$row['last_activity'].' </td>
<td><a href="/FreeBSD-ports/pr.php/'.$c.'/'.$p.'/'.str_replace('ports/','',$row['pr']).'">'.$row['pr'].'</a> </td>
<td>'.$row['who'].' </td>
<td>'.$row['desc'].' </td>
<td>'.$row['num_msgs'].' </td>
</tr>
';
	}
	$content .= '</table><p>&nbsp;</p>
<p><small><em><a href="http://www.freebsd.org/send-pr.html">Submit a problem report about the '.$p.' port on FreeBSD.org</a></em></small><hr /><h2>Files:</h2>';
	$ls = `ls -l $path/files`;
	$content .= '<pre>'.$ls.'</pre>
';
	
}

include('output.php');

//EOF