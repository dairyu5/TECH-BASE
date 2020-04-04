<html>
<html lang="ja">

<head>
  <title>mission3-3</title>
  <meta charset="utf-8N">
</head>

<body>
  <form action="mission_3-3.php" method="post">

<div>
    <label for="name">名前：</label>
      <input type="text" name="name">
    <!--このname属性のあとにvalue="◯"とするとフィールドにあらかじめ◯が表示される -->
</div>
<br>
<div>
    <label for="comment">コメント:</label>
      <textarea name="comment" cols="20" rows="1"></textarea>
      &nbsp;
      <input type="submit" value="送信" name="send_botton">
</div>
<br>
<div>
	<label for="delete">削除:</label>
	<input type="text" name="delete" placeholder="削除したい番号を入力">
	<input type="submit" value="削除" name="delete_botton">
</div>
<br>
  </form>
</body>

</html>

<?php
    // 名前とコメントの両方に、または削除に値が設定されているとき
    if (isset($_POST["name"]) && isset($_POST["comment"]) || isset($_POST["delete"])) {
	    //送信ボタンが押された時
	    if (isset($_POST["send_botton"])){
		echo "送信ボタンが押されました"."<br>";//正常に動いた！
	        // どちらも空白でない(!)とき
	        if (!$_POST["name"]=="" && !$_POST["comment"]=="") {
	            // 書き込む為の投稿番号を決定する
	            // テキストファイルを変数に格納
	            $filename="mission_3-3.txt";
	            // ファイルが存在し、中身が空でないとき
	            if (file_exists($filename) && !empty($filename)) {
	                //最後の行を取り出す
			//ファイルの中身を配列にする
	                $file_array=file($filename,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			//配列を数える
			$cnt=count($file_array);
			//最後の行を指定する
			$final_line=$file_array[$cnt -1];
			//最後の行を分割して
			$element=explode("<>",$final_line);
			//投稿番号を取り出して＋1する
			$num=$element[0] +1;
	                $fp=fopen($filename, "a");//追記モードで開けて
	                fwrite($fp, $num."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<br>\n");//POSTで書かれた文字列を書いて、改行して
	                fclose($fp);//ファイルを閉じる

	            // ファイルが存在して中身が空、またはファイルが存在しないとき
	            } elseif(file_exists($filename) && empty($filename) || !file_exist($filename)) {
	              $fp=fopen($filename, "w");//新規モードで開けて
	              fwrite($fp, "1"."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<br>\n");//POSTで書かれた文字列を書いて、改行して
	              fclose($fp);//ファイルを閉じる
		    //ファイルが存在しないとき	
	            }
	        }
	    
   
	
	    //削除ボタンが押されたとき
	 	}elseif(isset($_POST["delete_botton"])){
		//フィールドが空白なら
		if($_POST["delete"]==""){
		echo "番号を入力してください";
		//空白でないなら
		}else{
		$filename="mission_3-3.txt";
		
			//ファイルが存在するなら
			if (file_exists($filename)){
			//ファイルの中身を行ごとに配列として取り出す
			$file_array=file($filename);
			
			//ファイルの中身を空にする
			$fp=fopen($filename,"w");
			fclose($fp);
			
				//投稿番号を取得する
					
				//行の数だけループします、テキストファイルの中身（行たち）からある一行を$line_elementとして取り出す
				foreach ($file_array as $line_element){
				//行を分割する、$elementの中には1行の要素が配列で入る
				$element=explode("<>",$line_element);
					//投稿番号が$_POST["derete"]（削除したい投稿番号）と等しくないなら
					if($element[0]!==$_POST["delete"]){
					$filename="mission_3-3.txt";
					//ファイルを追記モードで開ける
					$fp=fopen($filename,"a");
					//配列の中身を改行しながら書く
					fputs($fp,$line_element."\n");
					//ファイルを閉じる
					fclose($fp);
					}
					
				}
			}
		}
		}

     }	    

	    // 書き込みを表示
	    $filename="mission_3-3.txt";//テキストファイルを変数に格納
	    // ファイルが存在するなら
	    if (file_exists($filename)) {

	        $comment_array=file($filename);//行ごとに配列にする

		foreach ($comment_array as $comment) {//行の数だけループする
		$com_element=explode("<>",$comment);//行の中の要素を分割する

			$printtext="";//この先要素を追加するための基準
			foreach($com_element as $value){//要素の数だけループする
			$printtext = $printtext.$value." ";//""(基準)に$value(1行の中における要素）を追加していく＝暗記しりとりと一緒
			}

		echo "<p>".$printtext."</p>";
		}
	    }
    
    //https://helog.jp/php/post-button/ 押されたボタンによって条件分岐
?>