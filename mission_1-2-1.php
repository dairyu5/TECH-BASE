<?php
$hensu="Roselia";
$filename="mission_1-2x.txt";
$fp=fopen($filename,"w");//「ｗ」は大文字にしないこと
fwrite($fp,$hensu);
fclose($fp);
?>