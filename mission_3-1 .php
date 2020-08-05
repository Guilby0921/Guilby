<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
   </head>
   
   <body> 
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前" >
        <input type="text" name="str" placeholder="コメント">
        <input type="submit" name="submit">
    </form>
    
     
    
    <?php
$str = $_POST["str"];
    $name = $_POST["name"];
    if (empty($str . $name)) {
    } else {
$filename="mission_3-1.txt";
$fp = fopen($filename,"a");
$date=date("Y年m月d日 H時i分s秒");
$num=count(file($filename));
$num++;
fwrite($fp,$num."<>".$name."<>".$str."<>".$date.PHP_EOL);
fclose($fp);


if(file_exists($filename)){
    $lines =(file($filename,FILE_IGNORE_NEW_LINES));
    foreach($lines as $line){
         echo $line . "<br>";
    
}
}
}
    ?>
   
</body>
</html>