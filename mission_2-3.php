<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    
</head>
<body>
     <form action="" method="post">
        <input type="text" name="str" value="comment">
        <input type="submit" name="submit">
    </form>
    
    <?php
$filename="mission_2-3.txt";
$str=$_POST["str"].PHP_EOL;
if ($str){
$fp = fopen($filename,"a");
fwrite($fp,$str);
fclose($fp);
    echo $str."を受け付けました<br>";
}



if(file_exists($filename)){
    $lines = file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        echo $line . "<br>";

    }
}
    
    ?>
   
</body>
</html>