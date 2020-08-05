<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27</title>
</head>
<body>
    <form action=""method="post">
        <input type="number" name="num"placeholder="数字を入力してください">
        <input type="submit" name="submit">
    </form>
<?php

$num=$_POST["num"].PHP_EOL;

$filename="mission_1-27.txt";
$fp = fopen($filename,"a");


fwrite($fp,$num);
fclose($fp);
echo "書き込み成功!<br>";


 
if(file_exists($filename)){
    $lines = file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $num0){
        
if($num0 %3 == 0 && $num0 % 5 == 0) {
            echo "FizzBuzz<br>";
        } elseif ($num0 % 3 == 0) {
            echo "Fizz<br>";
        } elseif ($num0 % 5 == 0) {
            echo "Buzz<br>";
        } else { 
            echo $num0."<br>";
        }
}
}
        
?>

</body>
</html>