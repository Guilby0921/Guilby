<?php
//4-1で書いた「// DB接続設定」のコードの下に続けて記載する。
	// DB接続設定
	$dsn = 'mysql:dbname=***;host=localhost';
	$user = 'tb-***';
	$password = 'PASSWORD';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	$sql = $pdo -> prepare("INSERT INTO tbtest456 (name, comment) VALUES (:name, :comment)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$name = 'ミート源五郎';
	$comment = 'ありーべでるち'; //好きな名前、好きな言葉は自分で決めること
	$sql -> execute();

	//bindParamの引数名（:name など）はテーブルのカラム名に併せるとミスが少なくなります。最適なものを適宜決めよう。
	?>