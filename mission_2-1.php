<html>
<html lang="ja">
    <head>
        <title>mission2-1</title>
<meta charset="utf-8N">
    </head>
  
<body>

<form action="mission_2-1.php" method="post">
	<p>テスト：<br>
	<input type="text" name="test">
	<input type="submit" value="送信"></p>
</form>
</body>
</html>

<?php
//mission2-1-2	
//https://proengineer.internous.co.jp/content/columnfeature/3941
	echo $_POST["test"]."を受け付けました";
?>
  
