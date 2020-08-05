<?php 
	//4-1で書いた「// DB接続設定」のコードの下に続けて記載する。
	// DB接続設定
	$dsn = 'mysql:dbname=***;host=localhost';
	$user = 'tb-***';
	$password = 'PASSWORD';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
	// 【！この SQLは tbtest テーブルを削除します！】
		$sql = 'DROP TABLE tbtest';
		$stmt = $pdo->query($sql);
		
 ?>