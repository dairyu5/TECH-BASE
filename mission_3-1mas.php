<html>
<html lang="ja">

<head>
  <title>mission3-1</title>
  <meta charset="utf-8N">
</head>

<body>
  <form action="mission_3-1mas.php" method="post">

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
    // 両方に値が設定されていて
    if (isset($_POST["name"]) && isset($_POST["comment"])) {
        // どちらも空白でない(!)とき
        if (!$_POST["name"]=="" && !$_POST["comment"]=="") {
            // 書き込む為の投稿番号を決定する
            // テキストファイルを変数に格納
            $filename="mission_3-1.txt";
            // ファイルが存在するなら
            if (file_exists($filename)) {
                //ファイルの行数をカウントして＋１する
                $num=count(file($filename))+1;
                $fp=fopen($filename, "a");//追記モードで開けて
                fwrite($fp, $num."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<br>\n");//POSTで書かれた文字列を書いて、改行して
                fclose($fp);//ファイルを閉じる
            // ファイルが存在しないなら
            } else {
                $fp=fopen($filename, "a");//追記モードで開けて
              fwrite($fp, "1"."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<br>\n");//POSTで書かれた文字列を書いて、改行して
              fclose($fp);//ファイルを閉じる
            }
        }
    }
	//↑ここまでは正常なことを確認

    // 書き込みを表示
    $filename="mission_3-1.txt";//テキストファイルを変数に格納
    // ファイルが存在するなら
    if (file_exists($filename)) {

        $comment_array=file($filename);//行ごとに配列にする
	foreach ($comment_array as $comment) {//行の数だけループする
	$com_element=explode("<>",$comment);//行の中の要素を分割する

		$printtext="";//この先要素を追加するための基準
		foreach($com_element as $value){//要素の数だけループする
		$printtext = $printtext.$value." ";//""(基準)に$value(1行の中における要素）を追加していく＝暗記しりとりと一緒
		}

	echo $printtext."<br>";
	}
    }
    //https://www.flatflag.nir87.com/date-473
?>