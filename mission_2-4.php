<html>
<html lang="ja">
    <head>
        <title>mission2-4</title>
<meta charset="utf-8N">
    </head>
  <body>
<form action="mission_2-4.php" method="post">
	<p>コメント：<br>

	<input type="text" name="test">
<!--このname属性のあとにvalue="◯"とするとフィールドにあらかじめ◯が表示される -->

	<input type="submit" value="送信"></p>
</form>
  </body>
</html>



<?php
	if(isset($_POST["test"])){//フィールドに値が代入されているとき（＝最初の画面以外の時
	
	if($_POST["test"]==""){//フィールドが空白であるとき
	$filename="mission_2-4.txt";//テキストファイルを変数に格納
	readfile($filename);

	}elseif($_POST["test"]=="完成！"){//もし空白ではなく、何かサーバー側に送信されたpostデータがあってそれが「完成！」だったら（これだけだったが最初のエラーの原因：最初は何も送信していないためエラーを返す）
	echo "おめでとう！";//おめでとう！と表示

	} else {//それ以外の場合（特定の文字列ではない文字列の時）
	$filename="mission_2-4.txt";//このファイルを
	$fp=fopen($filename,"a");//追記モードで開けて
	fwrite($fp,$_POST["test"]."<br>\n");//POSTで書かれた文字列を書いて、改行して
	fclose($fp);//ファイルを閉じる

	$filename="mission_2-4.txt";//テキストファイルを変数に格納
	$comment_array=file($filename);//行ごとに
	//mission2-4-1
	//echo$comment_array[0].$comment_array[1].$comment_array[2];
	foreach($comment_array as $comment){
	echo $comment;
	}
	}
	}
	

	//$fp=fopen($filename,"r");//読み込み専用モードでファイルを開く
//	$text=file_get_contents($fp);//開いたファイルからgetしたテキストを
//	echo $text;//表示する

	
?>