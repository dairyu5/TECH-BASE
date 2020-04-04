<?php
//記入例；以下は <?php から ?> で挟まれるPHP領域に記載すること。
	//4-2以降でも毎回接続は必要。
	//$dsnの式の中にスペースを入れないこと！

	// 【サンプル】
	// ・データベース名：
	// ・ユーザー名：
	// ・パスワード：
	// の学生の場合：

	$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

//4-1で書いた接続のコードの下に続けて記載する。
	$sql = "CREATE TABLE IF NOT EXISTS tbtest"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT"
	.");";
	$stmt = $pdo->query($sql);
	

	/*以下注釈のためコード内に含める必要はありません。
	IF NOT EXISTSを入れないと２回目以降にこのプログラムを呼び出した際に、
	SQLSTATE[42S01]: Base table or view already exists: 1050 Table 'tbtest' already exists
	という警告が発生します。これは、既に存在するテーブルを作成しようとした際に発生するエラーです。*/

//4-1で書いた接続のコードの下に続けて記載する。
	$sql ='SHOW TABLES';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[0];
		echo '<br>';
	}
	echo "<hr>";
?>