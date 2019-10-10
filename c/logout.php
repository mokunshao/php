<?php
setcookie('name', '', time() - 1);
echo '已退出';
echo '<br>';
echo '<a href=\'/c/index.php\'>首页</a>';
