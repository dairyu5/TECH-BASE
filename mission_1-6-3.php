<html>
    <head>
        <title>mission1-6-3</title>
<meta charset="utf-8N">
    </head>
  <body>
<?php
$shiritori=array("しりとり","リンゴ","ゴリラ","ラッパ","パンダ");//配列を変数で決定
$words="";

foreach($shiritori as $word){//foreach(配列as変数)＝配列から要素を一つずつ取り出して下の変数($word)にセット

$words=$words.$word;//wordsという変数は変数wordを追加する

echo $words."<br>";//echo 変数　＝セットされた変数（今回は文字列）を表示
}
?>
  </body>
</html>