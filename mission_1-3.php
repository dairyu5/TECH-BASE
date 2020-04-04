<?php
// ファイルを変数に格納
$filename = "mission_1-2.txt";
 
// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, "r");
 
// fgetsでファイルを読み込み、変数に格納
$txt = fgets($fp);
 
// ファイルを読み込んだ変数を出力
echo $txt;
 
// fcloseでファイルを閉じる
fclose($fp);
?>