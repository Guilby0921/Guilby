<?php
    $str = "Hello World" . PHP_EOL;
    $filename="misson_1-24.txt";
    $fp = fopen($filename,"a");
    fwrite($fp,$str);
    fclose($fp);
    echo "書き込み成功!";
?>