<?php

/* 404.php
   Copyright 2013 Waitman Gobble <waitman@waitman.net>
   LICENSE INFO IN README.txt
   Read directory structure under /usr/ports and store in database
*/

$se=htmlspecialchars($_REQUEST['se']);
$content = '<h1>FreeBSD Ports Index: OOpS!</h1>
<p>The term &quot;'.$se.'&quot; was not found on this system. 
Please try again later, or try another search term now.</p>
<p>&nbsp;</p>
<p><a href="/FreeBSD-ports/index.php">Return To Main Menu</a></p>
';

include('output.php');


