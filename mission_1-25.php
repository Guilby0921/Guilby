<?php
    $str = "Hello World" . PHP_EOL;
    $filename="misson_1-25.txt";
    $fp = fopen($filename,"w");
    fwrite($fp,$str);
    fclose($fp);
    echo "書き込み成功!";
?>