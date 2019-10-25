<?php

// 路由原理

$uri = $_SERVER['REQUEST_URI'];
echo $uri;
echo '<br>';

$route = explode('/', $uri);
var_dump($route);
echo '<hr>';

// http://localhost:7777/23.php/admin/user/add
$query = array_slice($route, 2);
var_dump($query);
list($module, $controller, $action) = $query;
echo '<br>';
echo '模块:' . $module . '<br>';
echo '控制器:' . $controller . '<br>';
echo '操作:' . $action . '<br>';
echo '<hr>';

// http://localhost:7777/23.php/admin/user/add/name/peter/age/18
$query2 = array_slice($route, 5);
var_dump($query2);
echo '<br>';
for ($i = 0; $i < count($query2); $i += 2) {
  $params[$query2[$i]] = $query2[$i + 1];
}
var_dump($params);
echo '<hr>';

class User
{
  public function getQuery($name, $age)
  {
    return __METHOD__ . ' 名字：' . $name . ' 年龄：' . $age;
  }
}

echo call_user_func_array([new User(), 'getQuery'], $params);
