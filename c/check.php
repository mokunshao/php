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
    setcookie('name', $user['name'], time() + 3600);
  } else {
    die('密码错误');
  }
} else {
  die('请求类型错误');
}
echo '<br>';
echo '<a href=\'/c/index.php\'>首页</a>';
