<?php

/* output.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
*/

$layout=join('',file('layout.html'));
$html=str_replace('<!--Content-->',$content,$layout);
$html=str_replace('<title>','<title>'.trim($title).' ',$html);
echo $html;

//EOF