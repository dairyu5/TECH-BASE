<?php
$hensu="Roselia";
$filename="mission_1-2x.txt";
$fp=fopen($filename,"w");//�u���v�͑啶���ɂ��Ȃ�����
fwrite($fp,$hensu);
fclose($fp);
?>