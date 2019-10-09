<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <form action="" method="post">
    <input type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ?  $_POST['username'] : '' ?>">
    <input type="password" name="password" id="password" value="<?php echo isset($_POST['password']) ?  $_POST['password'] : '' ?>">
    <button type="submit">登录</button>
  </form>
  <?php
  var_dump($_POST);
  if (isset($_POST['username'])) {
    echo '<br>' . $_POST['username'];
  }
  if (!empty($_POST['password'])) {
    echo '<br>' . $_POST['password'];
  }
  ?>
  <form action="" method="get">
    <input type="text" name="username2" id="username2" value="<?php echo isset($_GET['username2']) ?  $_GET['username2'] : '' ?>">
    <input type="password" name="password2" id="password2" value="<?php echo isset($_GET['password2']) ?  $_GET['password2'] : '' ?>">
    <button type="submit">登录</button>
  </form>
  <?php var_dump($_GET);
  echo isset($_GET['username2']) ? '<br>' . $_GET['username2'] : '';
  echo !empty($_GET['password2']) ? '<br>' . $_GET['password2'] : '';
  ?>
</body>

</html>