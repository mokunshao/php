<?php if (empty($_COOKIE['name'])) : ?>
  <a href="/c/login.php">登录</a>
<?php else : ?>
  <div>欢迎<?php echo $_COOKIE['name']; ?></div>
  <a href="/c/logout.php">退出</a>
<?php endif; ?>