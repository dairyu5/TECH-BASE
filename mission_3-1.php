<html>
<html lang="ja">
    <head>
        <title>mission3-1</title>
<meta charset="utf-8N">
    </head>
  <body>
<form action="mission_3-1.php" method="post">

	<p>名前：<br>
	<input type="text" name="name"></p>
<!--このname属性のあとにvalue="◯"とするとフィールドにあらかじめ◯が表示される -->

	<p>コメント:<br>
	<textarea name="comment" cols="20" rows="2"></textarea>
	&nbsp;
	<input type="submit" value="送信"></p>
</form>
  </body>
</html>

<?php
	if(isset($_POST["name"]) && isset($_POST["comment"]){//両方のフィールドに値が代入されているとき（＝最初の画面以外の時

	$filename="mission_3-1.txt"; //このファイルを
	
	//if(file_exists($filename)){//存在するとき
	$kakikomi_array=file($filename);
	$num=count($kakikomi_array);


	$fp=fopen($filename,"a");//追記モードで開けて
	fwrite($fp,$num+1."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<br>\n");//POSTで書かれた文字列を書いて、改行して
	fclose($fp);//ファイルを閉じる

	$filename="mission_3-1.txt";//テキストファイルを変数に格納
	$comment_array=file($filename);//行ごとに
	foreach($comment_array as $comment){
	echo $comment;
	}

	}elseif($_POST["name"]=="" || $_POST["comment"]==""){//どちらかのフィールドが空白であるとき
	$filename="mission_3-1.txt";//テキストファイルを変数に格納
	readfile($filename);
	//それ以外の場合（どちらのフィールドも入力された時）
	
	
//https://www.flatflag.nir87.com/date-473	

?>
