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
    $str = $_POST["str"];
    echo $str;
    echo "を受け付けました"
    ?>
   
</body>
</html>