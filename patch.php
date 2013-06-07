<?php

/* patch.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
   Read directory structure under /usr/ports and store in database
*/

/* Reads the search_results array and returns json string to 
   jquery ui autocomplete widget */
   
$search_results = unserialize(join('',file('work/cache/search_results.txt')));
$q = trim(strtolower($_REQUEST["term"]));
$sl = strlen($q);

$return = array();
foreach ($search_results as $k=>$v) {
	/* match beginning of string. seems to work ok, 
	   but maybe need a fuzzier search? */
	if (substr($k,0,$sl)==$q) 
		array_push($return,array('label'=>$k,'value'=>$k));
}
echo(json_encode($return));

//EOF

