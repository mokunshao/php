
<?php if (empty($_SESSION['name'])) : ?>
  <a href="/e/dispatch.php?action=login">登录</a>
<?php else : ?>
  <div>欢迎<?php echo $_SESSION['name']; ?></div>
  <a href="/e/dispatch.php?action=logout">退出</a>
<?php endif; ?>