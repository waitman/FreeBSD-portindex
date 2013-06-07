<?php
/* ToDo: NOT USED */

/* clean ports pass portlint */
$t=`find cache/lint | xargs grep -l "looks fine"`;
$c=explode("\n",$t);

$clean=array();
foreach ($c as $v) {
        if ($v!='') {
                $v=str_replace('cache/lint/','',$v);
                $r=explode('/',$v);
                $clean[$r[0]][str_replace('.txt','',str_replace('lint-'.$r[0].'-
','',$r[1]))]=true;
        }
}

/* calculate dirty ports, set intersection */
$dirty=array();
ksort($ports);
/* Remove Mk, Tool, Templates */
for($i=0;$i<3;$i++) array_shift($ports);
foreach ($ports as $k=>$v) {
        foreach ($v as $l=>$m) {
                if (!@$clean[$k][$l]) $dirty[$k][$l]=true;
                echo '@clean '.$k.' '.$l.' '.@$clean[$k][$l].' @dirty '.@$dirty[
$k][$l]."\n";
        }
}

$fp=fopen('cache/dirty.txt','w');
fwrite($fp,serialize($dirty));
fclose($fp);
$fp=fopen('cache/clean.txt','w');
fwrite($fp,serialize($clean));
fclose($fp);

//EOF