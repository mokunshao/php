<?php

// mvc 原理

$server = $_SERVER;

// exmaple: http://localhost:7777/k/index.php/one/two

$script_name = $server['SCRIPT_NAME']; // /k/index.php
$request_uri = $server['REQUEST_URI']; // /k/index.php/one/two
$path_info = $server['PATH_INFO']; // /one/two

// $path = ltrim(str_replace($script_name, '', $request_uri), '/');  // one/two
// 相当于下面这行

$path = ltrim($path_info, '/'); // one/two

$controller_method = explode('/', $path);

$controller = ucfirst($controller_method[0]);

$method = $controller_method[1];

require_once __DIR__ . '/controllers/' . $controller . '.php';

$obj = new $controller();
$res = $obj->$method();
die($res);
