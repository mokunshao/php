<?php
setcookie('test', 'hello', time() + 60);
setcookie('token', '12334', time() + 60);
print_r($_COOKIE);

// 删除客户端的 cookie，把过期时间设置为过去某一个时间
// setcookie('token', '', time() - 1);

session_start();

$_SESSION['id'] = 3;
$_SESSION['name'] = 'mike';
$_SESSION['arr']['name'] = 'mike';
$_SESSION['arr']['id'] = 3;

// session_destroy();
// 删除 session 文件

// session_unset();
// 清空 session 文件内容

// session_reset();
// 回滚到上一次的会话

// setcookie('PHPSESSID', '', time() - 1);

print_r($_SESSION);
