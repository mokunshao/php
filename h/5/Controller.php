<?php

namespace _h5;

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

// 外观模式
class Facade
{
  protected static $container = null;
  protected static $data = [];
  public static function init(Container $container)
  {
    static::$container = $container;
  }
  public static function getData()
  {
    static::$data = static::$container->make('model')->getData();
  }
  public static function render()
  {
    return static::$container->make('view')->render(static::$data);
  }
}
class Controller
{
  // 依赖注入
  public function __construct(Container $container)
  {
    Facade::init($container);
  }
  public function index()
  {
    Facade::getData();
    return Facade::render();
  }
}

$controller = new Controller($container);
echo $controller->index();
