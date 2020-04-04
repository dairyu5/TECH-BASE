<html>
<html lang="ja">
    <head>
        <title>mission2-2</title>
<meta charset="utf-8N">
    </head>
  <body>
<form action="mission_2-2.php" method="post">
	<p>テスト：<br>

	<input type="text" name="test">
<!--このname属性のあとにvalue="◯"とするとフィールドにあらかじめ◯が表示される -->

	<input type="submit" value="送信"></p>
</form>
  </body>
</html>



<?php
//mission2-2-2
	if(isset($_POST["test"])){//フィールドに値（文字・数字など）が入っている時、という条件付け→最初のエラーを制御＝最初は何も入ってないから下の動作をしなくなる

	if($_POST["test"]=="完成！"){//もし何かサーバー側に送信されたpostデータがあったら（これだけだったが最初のエラーの原因：最初は何も送信していないためエラーを返す）
	echo "おめでとう！";
	} else {
//mission2-2-1
	$filename="mission_2-2.txt";
	$fp=fopen($filename,"a");
	fwrite($fp,$_POST["test"]);
	fclose($fp);

	$filename="mission_2-2.txt";//テキストファイルを変数に格納
	$fp=fopen($filename,"r");//読み込み専用モードでファイルを開く
	$text=fgets($fp);//開いたファイルからgetしたテキストを
	echo $text;//表示する
	}
	}
?>
