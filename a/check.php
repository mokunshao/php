<?php
require __DIR__ . '/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = 'SELECT * FROM user WHERE `username` = :username AND `password` = :password';

  $stmt = $pdo->prepare($sql);

  $stmt->execute([
    'username' => $username,
    'password' => md5($password)
  ]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($user === false) {
    echo '<script>alert("账号或密码错误");history.back();</script>';
  } else {
    echo '<script>alert("登录成功");location.assign("./index.php");</script>';
  }
} else {
  die('请求类型错误');
}
