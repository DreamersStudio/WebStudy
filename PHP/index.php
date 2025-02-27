<!DOCTYPE html>
<html>
<head>
    <title>PHP变量插入HTML</title>
</head>
<body>
    <?php
        $name = "张三";
        echo "<h1>你好，" . $name . "！</h1>";
    ?>
    <form action="process.php" method="get">
    <input type="text" name="username">
    <input type="submit" value="提交">
</form>

<form action="process.php" method="post">
    <input type="text" name="password">
    <input type="submit" value="提交">
</form>
</body>
</html>
