<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // 如果请求方法不是 POST，则重定向到注册页面或显示错误信息
    header("Location: index.php"); // 重定向到注册页面
    // 或者
    // echo "非法访问！";
    exit; // 终止脚本执行
}

// 后续处理表单数据的代码
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (empty($username) || empty($password) || empty($email)) {
    echo "所有字段都必须填写！";
} else {
    echo "用户名：" . $username . "<br>";
    echo "密码：" . $password . "<br>";
    echo "邮箱：" . $email . "<br>";
}
