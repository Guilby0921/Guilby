<!DOCTYPE html> 
<html lang="ja"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>mission_5-1</title> 
 
</head> 
   <body> 
        
    <!--プログラムは上から下に実行されるので、 
    フォームに表示する内容を先に指定したいため、 
    フォームを一番下に起きます--> 
     
<?php 

    $str = $_POST["str"]; 
    $name = $_POST["name"]; 
    $delete=$_POST["delete"]; 
    $edit=$_POST["edit"]; 
    $editmode=$_POST["editmode"]; 
    
    $pass=$_POST["pass"];
    $pass1=$_POST["pass1"];
    $pass2=$_POST["pass2"];
   
   
   
    
    	//4-1で書いた「// DB接続設定」のコードの下に続けて記載する。
//4-2の内容
	// DB接続設定
	$dsn = 'mysql:dbname=***;host=localhost';
	$user = 'tb-***';
	$password = 'PASSWORD';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
	
	$sql = "CREATE TABLE IF NOT EXISTS tbtest810"

	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32)," //name ・名前を入れる。文字列、半角英数で32文字。
	. "comment TEXT,"  //comment ・コメントを入れる。文字列、長めの文章も入る。
	. "date TEXT"
	.");";
	$stmt = $pdo->query($sql);
	
	
  //削除機能
  
  if (empty($delete)){ 
    } else { 
         if($pass1!="a"){
         echo "パスワードが違います";
    }  else{
    
            if($delete!= id){    
    
    $id =$delete;
   $sql = 'delete from tbtest810 where id=:id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   $stmt->execute();


	//続けて、4-6の SELECTで表示させる機能 も記述し、表示もさせる。
		$id =$delete; // idがこの値のデータだけを抽出したい、とする

$sql = 'SELECT * FROM tbtest810 WHERE id=:id ';
$stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
$stmt->execute();                             // ←SQLを実行する。
$results = $stmt->fetchAll(); 
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
	
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].',';
		echo $row['date'].'<br>';
	echo "<hr>";
	
	}
    
            }
     }
    }
    

   
     
    
   
    //編集(投稿フォームに過去投稿を飛ばす操作）
  
    if (empty($edit)){ 
    } else {  
        if($pass2!="a"){
         echo "パスワードが違います";
    }  else{
        
  //bindParamの引数（:nameなど）は4-2でどんな名前のカラムを設定したかで変える必要がある。

 
		$id =$edit ; // idがこの値のデータだけを抽出したい、とする

$sql = 'SELECT * FROM tbtest810 WHERE id=:id ';
$stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
$stmt->execute();                             // ←SQLを実行する。
$results = $stmt->fetchAll(); 

	foreach ($results as $row)

    
	//編集したい投稿番号($edit)＝投稿番号($id)ならばという条件を作る 
if($edit==$id){ 
              
                $newnum = $row[0]; //編集したい投稿の番号 
                $newname = $row[1]; //編集したい投稿の名前 
                $newcomment = $row[2]; //編集したい投稿のコメント 
 //上で指定した3つの変数を投稿フォームに表示するように設定します 
}
}
}




 //編集（投稿を書き換える操作） 
 
  if($name && $str && $editmode){ //編集の場合 
  //foreach ($results as $row)
  
   if($editmode!=$id){ 
       
      
	//bindParamの引数（:nameなど）は4-2でどんな名前のカラムを設定したかで変える必要がある。
	$id = $editmode; //変更する投稿番号
	$name = $name ;
    $date = date("Y年m月d日H時i分s秒"); 
	$comment = $str; //変更したい名前、変更したいコメントは自分で決めること
	$sql = 'UPDATE tbtest810 SET name=:name,comment=:comment,date=:date WHERE id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
	$stmt->bindParam(':date', $date, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();

 	

	//続けて、4-6の SELECTで表示させる機能 も記述し、表示もさせる。
	
		$id = $editmode; // idがこの値のデータだけを抽出したい、とする
/*
$sql = 'SELECT * FROM tbtest999 WHERE id=:id ';
$stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
$stmt->execute();                             // ←SQLを実行する。
$results = $stmt->fetchAll(); 
*/
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		
		
	echo $row['$id'].',';
		echo $row['name'].',';
		echo $row['comment'].',';
	    echo $row['date'].'<br>';
		
	echo "<hr>";
	
	}
	
   }
  }
  
	
	
	
   else if ($name && $str && empty($editmode)){ 
   
  // if ($name && $str && empty($editmode)){ 
    //通常投稿 
    //投稿機能は条件の一部が編集機能とかぶってしまうため 
    //$editmodeが空であるを条件に加えて 
    //編集との場合分けを明確にします 
      
       if($pass!="a"){
      echo "パスワードが違います";
       }else{
           
       
        //4-5の内容
		$sql = $pdo -> prepare("INSERT INTO tbtest810 (name, comment,date) VALUES (:name, :comment ,:date)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$sql -> bindParam(":date",$date,PDO::PARAM_STR);
	$name = $name ;
	$comment = $str ; //好きな名前、好きな言葉は自分で決めること
	$date = date("Y年m月d日H時i分s秒"); 
	$sql -> execute();

	//bindParamの引数名（:name など）はテーブルのカラム名に併せるとミスが少なくなります。最適なものを適宜決めよう。
    
        
       
       }
    }
    
    
    
     
    
    
    
    
      //4-6の内容
    $sql = 'SELECT * FROM tbtest810';
$stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
$stmt->execute();                             // ←SQLを実行する。
$results = $stmt->fetchAll(); 
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].',';
		echo $row['date'].'<br>';
		
	echo "<hr>";
	}
    
    
            
  
    ?> 
     
    <form action="" method="POST"> 
        <!--value内にPHPを使って投稿内容を表示させます--> 
        <!--詳しくは送ったURLを見てみてください--> 
        <input type="text" name="name" placeholder="名前" value="<?php echo htmlspecialchars($newname); ?>"> 
        <P><input type="text" name="str" placeholder="コメント" value="<?php echo htmlspecialchars($newcomment); ?>"> 
         <input type="text" name="pass" placeholder="パスワード"> 
        <!--投稿が編集か新規投稿か分かるように見分けるためのフォームを作ります--> 
        <!--このフォームに数字が入っていれば編集モードだと判断します--> 
        <!--ここでは分かりやすく表示状態にしています--> 
        <!--完成時にtype=hiddenで隠してください--> 
        <input type="hidden" name="editmode" placeholder="編集する投稿番号" value="<?php echo htmlspecialchars($newnum); ?>"> 
         
        <input type="submit" name="submit"></P> 
        <P><input type="number" name="delete" placeholder="削除対象番号"> 
         <input type="text" name="pass1" placeholder="パスワード"> 
        <input type="submit" name="submit" value="削除"></P> 
        <P><input type="number" name="edit" placeholder="編集対象番号"> 
                <input type="text" name="pass2" placeholder="パスワード"> 
        <input type="submit" name="submit" value="編集"></P> 
        
    </form> 
     
</body> 
</html>