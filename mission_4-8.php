<?PHP
	//4-1で書いた「// DB接続設定」のコードの下に続けて記載する。
	// DB接続設定
	$dsn = 'mysql:dbname=***;host=localhost';
	$user = 'tb-***';
	$password = 'PASSWORD';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
   $id = 4;
   $sql = 'delete from tbtest where id=:id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   $stmt->execute();


	//続けて、4-6の SELECTで表示させる機能 も記述し、表示もさせる。
		$id = 4; // idがこの値のデータだけを抽出したい、とする

$sql = 'SELECT * FROM tbtest WHERE id=:id ';
$stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
$stmt->execute();                             // ←SQLを実行する。
$results = $stmt->fetchAll(); 
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].'<br>';
	echo "<hr>";
	}
	//※ データベース接続は上記で行っている状態なので、その部分は不要
	?>