<?php
$hensu="RAISE A SUIREN";
$filename="mission_1-2.txt";
$fp=fopen($filename,"w");//「ｗ」は大文字にしないこと
fwrite($fp,$hensu);
fclose($fp);
?>