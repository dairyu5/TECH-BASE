<?php
// �t�@�C����ϐ��Ɋi�[
$filename = "mission_1-2.txt";
 
// fopen�Ńt�@�C�����J���i'r'�͓ǂݍ��݃��[�h�ŊJ���j
$fp = fopen($filename, "r");
 
// fgets�Ńt�@�C����ǂݍ��݁A�ϐ��Ɋi�[
$txt = fgets($fp);
 
// �t�@�C����ǂݍ��񂾕ϐ����o��
echo $txt;
 
// fclose�Ńt�@�C�������
fclose($fp);
?>