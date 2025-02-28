<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" >
    <title>PHP变量插入HTML</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
$name = "William";
echo "<h1>你好，" . $name . "！</h1>";
?>
<div class="myForm">
    <form action="process_register.php" method="post">
        <label for="username">用户名：</label>
        <input type="text" name="username" id="username"><br><br>
        <label for="password">密码：</label>
        <input type="password" name="password" id="password"><br><br>
        <label for="email">邮箱：</label>
        <input type="email" name="email" id="email"><br><br>
        <input type="submit" value="注册">
    </form>
    
</div>
</body>
</html>
