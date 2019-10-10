<?php
if (isset($_COOKIE['name'])) {
  echo '<script>alert("不要重复登录");location.assign("/c/index.php");</script>';
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登录</title>
</head>

<body>
  <h3>登录</h3>
  <form action="/c/check.php" method="post" onsubmit="return isEmpty()">
    <label for="username">用户名</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">密码</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit">登录</button>
  </form>
  <script>
    function isEmpty() {
      var phone = document.getElementById('username').value;
      var password = document.getElementById('password').value;

      if (phone.length === 0 || password.length === 0) {
        alert('手机和密码不能为空');
        return false;
      }
    }
  </script>
</body>

</html>