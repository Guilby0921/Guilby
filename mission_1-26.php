<?php
$str = "こんにちは" . PHP_EOL;
$filename="mission_1-26.txt";
$fp = fopen("mission_1-26","a");
fwrite($fp,$str);
fclose($fp);
echo "書き込み成功!<br>";

if(file_exists($filename)){
    $lines = file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        echo $line . "<br>";
    }
}
?>