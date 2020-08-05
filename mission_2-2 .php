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
$filename="mission_2-2.txt";
$str=$_POST["str"];
if ($str){
$fp = fopen($filename,"w");
fwrite($fp,$str);
fclose($fp);
if($str=="完成！"){
echo "おめでとう";
} else{
    echo $str."を受け付けました<br>";
}
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