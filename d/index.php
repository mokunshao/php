<?php if (empty($_COOKIE['name'])) : ?>
  <a href="/d/dispatch.php?action=login">登录</a>
<?php else : ?>
  <div>欢迎<?php echo $_COOKIE['name']; ?></div>
  <a href="/d/dispatch.php?action=logout">退出</a>
<?php endif; ?>