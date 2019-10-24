<?php

namespace _21;

// 单例模式
class A
{
  private function __construct()
  { }
  private function __clone()
  { }
  private static $instance = null;
  public static function getInstance()
  {
    if (is_null(static::$instance)) {
      static::$instance = new A();
    }
    return static::$instance;
  }
}
$a = A::getInstance();
$b = A::getInstance();

var_dump($a == $b);
var_dump($a === $b);
