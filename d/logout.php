<?php
setcookie('name', '', time() - 1);
echo '已退出';
echo '<br>';
echo '<a href=\'/d/dispatch.php?action=index\'>首页</a>';
