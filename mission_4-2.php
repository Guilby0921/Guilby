<?php
	//4-1で書いた「// DB接続設定」のコードの下に続けて記載する。

	// DB接続設定
	$dsn = 'mysql:dbname=***;host=localhost';
	$user = 'tb-***';
	$password = 'PASSWORD';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
	$sql = "CREATE TABLE IF NOT EXISTS tbtest123"

	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32)," //name ・名前を入れる。文字列、半角英数で32文字。
	. "comment TEXT"  //comment ・コメントを入れる。文字列、長めの文章も入る。
	.");";
	$stmt = $pdo->query($sql);
	
	
	?>