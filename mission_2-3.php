<html>
<html lang="ja">
    <head>
        <title>mission2-2</title>
<meta charset="utf-8N">
    </head>
  <body>
<form action="mission_2-3.php" method="post">
	<p>テスト：<br>

	<input type="text" name="test">
<!--このname属性のあとにvalue="◯"とするとフィールドにあらかじめ◯が表示される -->

	<input type="submit" value="送信"></p>
</form>
  </body>
</html>



<?php
	if(isset($_POST["test"])){//フィールドに値が代入されているとき（＝最初の画面以外の時
	
	if($_POST["test"]==""){//フィールドが空白であるとき
	$filename="mission_2-3.txt";//テキストファイルを変数に格納
	readfile($filename);

	}elseif($_POST["test"]=="完成！"){//もし空白ではなく、何かサーバー側に送信されたpostデータがあってそれが「完成！」だったら（これだけだったが最初のエラーの原因：最初は何も送信していないためエラーを返す）
	echo "おめでとう！";//おめでとう！と表示

	} else {//それ以外の場合（特定の文字列ではない文字列の時）
	$filename="mission_2-3.txt";//このファイルを
	$fp=fopen($filename,"a");//追記モードで開けて
	fwrite($fp,$_POST["test"]."<br>\n");//POSTで書かれた文字列を書いて、改行して
	fclose($fp);//ファイルを閉じる

	$filename="mission_2-3.txt";//テキストファイルを変数に格納
	readfile($filename);//このファイルを読み込む
	}
	}
	

	//$fp=fopen($filename,"r");//読み込み専用モードでファイルを開く
//	$text=file_get_contents($fp);//開いたファイルからgetしたテキストを
//	echo $text;//表示する

	
?>