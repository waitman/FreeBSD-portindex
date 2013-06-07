<?php

/* red.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
   Read directory structure under /usr/ports and store in database
*/

$search_results = unserialize(join('',file('work/cache/search_results.txt')));
$q = trim(strtolower($_REQUEST['se']));
$sl = strlen($q);

/* this should work even if the user does not use the jquery auto-complete
   only returns first found result though. no 'results page' functionality. */
   
if ($sl>0) {
	foreach ($search_results as $k=>$v) {
		if (substr($k,0,$sl)==$q) {
			$this_result = $v;
			break;
		}
	}
	if ($this_result=='') {
		$this_result = '/FreeBSD-ports/404.php?se='.$q;
	}
} else {
	$this_result = '/FreeBSD-ports/404.php?se='.$q;
}

/* Should never receive 404 if the user gets the drop-down list */

Header("Location: ".$this_result);
exit(0);

