<?php
require __DIR__ . '/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = 'SELECT * FROM user WHERE `username` = :username';

  $stmt = $pdo->prepare($sql);

  $stmt->execute([
    'username' => $username,
  ]);
  if (empty($username)) {
    die('请输入用户名');
  }
  if (empty($password)) {
    die('请输入密码');
  }
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($user === false) {
    die('不存在该用户名');
  }
  if ($user['password'] === md5($password)) {
    echo '登录成功';
  } else {
    die('密码错误');
  }
} else {
  die('请求类型错误');
}
