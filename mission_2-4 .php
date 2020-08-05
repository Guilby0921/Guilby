<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
   </head>
   
   <body> 
    <form action="" method="post">
        <input type="text" name="str" placeholder="名前を入れてください">
        <input type="submit" name="submit">
    </form>

    
    <?php
$str=$_POST["str"];

if(empty($str)){
echo"";
  }else{
$filename="mission_2-4.txt";
$fp = fopen($filename,"a");
fwrite($fp,$str."\n");
fclose($fp);

if(file_exists($filename)){
    $lines = array(file($filename));
    foreach($lines as $line){
    
echo "おめでとう!by".$line[0]."<br>";
echo "おめでとう!by".$line[1]."<br>";
echo "おめでとう!by".$line[2]."<br>";
echo "おめでとう!by".$line[3]."<br>";
}
}
}

    ?>
   
</body>
</html>