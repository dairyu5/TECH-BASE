<?php
//変数を先に定義するため先に書く
//初期状態を指定
$recall_name="";
$recall_comment="";
$recall_number="";
	if(isset($_POST["edit_botton"])){
		//編集したい行を投稿フォームに表示する（編集選択機能）
		//フォームが空白のとき
		if($_POST["edit"]==""){
		//「編集したい番号を入力してください」と表示
		echo "編集したい番号を入力してください";
		//空白でないとき
		}else{
		echo "編集ボタンが押されました";

		$filename="mission_3-4.txt";
			//ファイルが存在し、空白でないなら
			if(file_exists($filename) && !empty($filename)){
			//テキストファイルの中身を配列にする
			$file_array=file($filename);

			//投稿番号を取得する
			
			//行の数だけループします、テキストファイルの中身（行たち）からある一行を$line_elementとして取り出す
				foreach ($file_array as $line_element){
				//行を分割する、$elementの中には1行の要素が配列で入る
				$element=explode("<>",$line_element);

				//行の番号（ひとつめの要素）とPOSTされた数字が一致するとき
					if($element[0]==$_POST["edit"]){
					//その行をフォームに表示
					//再表示用の変数に格納
					$recall_name=$element[1];
					$recall_comment=$element[2];
					//行の番号を隠れたフォームに表示（編集であることのラベル）
					$recall_number=$element[0];
					}
				}
			}
		}
	}
?>


<html>
<html lang="ja">

<head>
  <title>mission3-4</title>
  <meta charset="utf-8N">
</head>

<body>
  <form action="mission_3-4.php" method="post">

<div>
    <label for="name"></label>
      <input type="text" name="name" placeholder="名前" value="<?php echo $recall_name ?>">
    <!--このname属性のあとにvalue="◯"とするとフィールドにあらかじめ◯が表示される -->
</div>
<br>
<div>
    <label for="comment"></label>
      <textarea name="comment" cols="20" rows="1" placeholder="コメント"><?php echo $recall_comment ?></textarea>
      &nbsp;
      <input type="submit" value="送信" name="send_botton">
</div>
<br>
<div>
    <label for="edit_number"></label>
      <input type="hidden" name="edit_number" value="<?php echo $recall_number ?>">
    <!--このname属性のあとにvalue="◯"とするとフィールドにあらかじめ◯が表示される -->
</div>
<br>
<div>
	<label for="delete"></label>
	<input type="text" name="delete" placeholder="削除したい番号を入力">
	<input type="submit" value="削除" name="delete_botton">
</div>
<br>
<div>
	<label for="edit"></label>
	<input type="text" name="edit" placeholder="編集したい番号を入力">
	<input type="submit" value="編集" name="edit_botton">
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
		//編集ラベルのフィールドに値がある時（編集を実行するとき）
		if(isset($_POST["edit_number"])){
		$filename="mission_3-4.txt";
		
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
					//投稿番号が"edit_number"（編集したい投稿番号）と等しくないなら
					if($element[0]!==$_POST["edit_number"]){
					$filename="mission_3-4.txt";
					//ファイルを追記モードで開ける
					$fp=fopen($filename,"a");
					//配列の中身を改行しながら書く
					fputs($fp,$line_element."\n");
					//ファイルを閉じる
					fclose($fp);
					//編集したい番号と等しいなら
					}elseif($element[0]==$_POST["edit_number"]){
					$filename="mission_3-4.txt";
					//ファイルを追記モードで開ける
					$fp=fopen($filename,"a");
					//編集したいように書き換え
					fwrite($fp,$_POST["edit_number"]."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<>"."編集済み"."<br>\n");
					fclose($fp);
					}
				}
			}
		}
	        // 編集でなく、どちらも空白でなく(!)、かつedit_numberが空白のとき
	        if (!$_POST["name"]=="" && !$_POST["comment"]=="" && empty($_POST["edit_number"])) {
	            // 書き込む為の投稿番号を決定する
	            // テキストファイルを変数に格納
	            $filename="mission_3-4.txt";
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

	            // ファイルが存在して中身が空のとき
			} elseif(file_exists($filename) && empty($filename)) {
	                $fp=fopen($filename, "a");//追記モードで開けて
	                fwrite($fp, "1"."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<br>\n");//POSTで書かれた文字列を書いて、改行して
	                fclose($fp);//ファイルを閉じる

		    //ファイルが存在しないとき
			}else{
			 $fp=fopen($filename, "a");//追記モードで開けて
	                 fwrite($fp, "1"."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<br>\n");//POSTで書かれた文字列を書いて、改行して
	                 fclose($fp);//ファイルを閉じる
		        }
		}
	    
   
	
	    //削除ボタンが押されたとき
	}elseif(isset($_POST["delete_botton"])){
		//フィールドが空白なら
		if($_POST["delete"]==""){
		echo "番号を入力してください";
		//空白でないなら
		}else{
		echo "削除ボタンが押されました";
		$filename="mission_3-4.txt";
		
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
					$filename="mission_3-4.txt";
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
	    $filename="mission_3-4.txt";//テキストファイルを変数に格納
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