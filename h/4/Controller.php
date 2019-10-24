<?php

namespace _h4;

use Closure;

require './Model.php';
require './View.php';

use Model;
use View;

class Container
{
  protected $instance = [];
  public function bind($alias, Closure $process)
  {
    $this->instance[$alias] = $process;
  }
  public function make($alias, ...$params)
  {
    return call_user_func_array($this->instance[$alias], $params);
  }
}

$container = new Container();

$container->bind('model', function () {
  return new Model();
});

$container->bind('view', function () {
  return new View();
});

class Controller
{
  // 依赖注入
  public function index(Container $container)
  {
    $data = $container->make('model')->getData();
    return $container->make('view')->render($data);
  }
}
$model = new Model();
$view = new View();
$controller = new Controller();
echo $controller->index($container);
