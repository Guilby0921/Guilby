<!DOCTYPE html> 
<html lang="ja"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>mission_3-4</title> 
 
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
     
     
    //削除 
    if (empty($delete)){ 
    } else { 
        $filename = "mission_3-4.txt"; 
        $lines = file($filename,FILE_IGNORE_NEW_LINES);     
        $fp=fopen($filename,"w");  
        foreach ($lines as $line){ 
            $line= explode("<>" , $line); 
            if($delete!=$line[0]){ 
                $txt=$line[0] ."<>".$line[1] ."<>".$line[2] ."<>".$line[3] .PHP_EOL; 
                fwrite($fp,$txt); 
            } 
        } 
    } 
               
    //編集(投稿フォームに過去投稿を飛ばす操作） 
    if (empty($edit)){ 
    } else {     
        $filename = "mission_3-4.txt"; 
        $lines = file($filename,FILE_IGNORE_NEW_LINES); 
        foreach ($lines as $line){ 
            $line= explode("<>" , $line); 
            //編集したい投稿番号($edit)＝投稿番号($line[0])ならばという条件を作る 
            if($edit==$line[0]){ 
                //↓投稿フォームに過去の投稿を表示したいだけなので削除します 
                //$A=$name . "<>" . $str . "<>"  . $num ."<>" .PHP_EOL; 
                $newnum = $line[0]; //編集したい投稿の番号 
                $newname = $line[1]; //編集したい投稿の名前 
                $newcomment = $line[2]; //編集したい投稿のコメント 
                //上で指定した3つの変数を投稿フォームに表示するように設定します 
                //フォームの方を参照してください 
            } 
        } 
    } 
     
    //【要確認】 
    //以下小川が新しく書き加えている部分です 
    //編集モードか見分けるフォーム（フォーム名：editmodeにしています） 
    //の入力内容を変数にします 
    //editmodeには、編集したい投稿番号(上で設定した$newnum)が入っています 
    $editmode=$_POST["editmode"]; 
     
    //編集（投稿を書き換える操作） 
    if($name && $str && $editmode){ //編集の場合 
        $filename = "mission_3-4.txt"; 
        $lines = file($filename,FILE_IGNORE_NEW_LINES);     
        $fp=fopen($filename,"w");  
        foreach ($lines as $line){ 
            $line= explode("<>" , $line); 
            if($editmode!=$line[0]){ 
                $txt=$line[0] ."<>".$line[1] ."<>".$line[2] ."<>".$line[3] .PHP_EOL; 
                fwrite($fp,$txt); 
            } else{ 
                $date = date("Y年m月d日H時i分s秒"); 
                $txt = $editmode."<>".$name."(編集済)"."<>".$str."<>".$date.PHP_EOL; 
                fwrite($fp,$txt); 
            } 
        } 
        fclose($fp); 
    }else if ($name && $str && empty($editmode)){ 
    //通常投稿 
    //投稿機能は条件の一部が編集機能とかぶってしまうため 
    //$editmodeが空であるを条件に加えて 
    //編集との場合分けを明確にします 
        $filename = "mission_3-4.txt"; 
        $fp = fopen($filename, "a"); 
        $date = date("Y年m月d日H時i分s秒"); 
        $num = count(file($filename)); 
        $num++; 
        fwrite($fp,  $num . "<>" . $name . "<>" . $str . "<>" . $date . PHP_EOL); 
    } 
     
    //以上小川が新しく書き加えている部分です 
    //【要確認】 
 
     
    //画面表示 
    if (file_exists($filename)) { 
        $lines = file($filename ,FILE_IGNORE_NEW_LINES); 
        foreach ($lines as $line) { 
            $line = explode("<>" , $line); 
            print_r($line[0] ." ".$line[1] ." ".$line[2] ." ".$line[3] ."<br>"); 
        } 
    } 
    fclose($fp);         
  
    ?> 
     
    <form action="" method="POST"> 
        <!--value内にPHPを使って投稿内容を表示させます--> 
        <!--詳しくは送ったURLを見てみてください--> 
        <input type="text" name="name" placeholder="名前" value="<?php echo htmlspecialchars($newname); ?>"> 
        <P><input type="text" name="str" placeholder="コメント" value="<?php echo htmlspecialchars($newcomment); ?>"> 
        <!--投稿が編集か新規投稿か分かるように見分けるためのフォームを作ります--> 
        <!--このフォームに数字が入っていれば編集モードだと判断します--> 
        <!--ここでは分かりやすく表示状態にしています--> 
        <!--完成時にtype=hiddenで隠してください--> 
        <input type="hidden" name="editmode" placeholder="編集する投稿番号" value="<?php echo htmlspecialchars($newnum); ?>"> 
         
        <input type="submit" name="submit"></P> 
        <P><input type="number" name="delete" placeholder="削除対象番号"> 
        <input type="submit" name="submit" value="削除"></P> 
        <!--番号なのでtype="number"にする--> 
        <P><input type="number" name="edit" placeholder="編集対象番号"> 
        <input type="submit" name="submit" value="編集"></P> 
        <!--下のフォームは必要ないので消します 
        <input type="text" name="fullname" value="<?=$A?>"> 
        --> 
    </form> 
     
</body> 
</html>