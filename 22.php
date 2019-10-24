<?php

namespace _22;
// 工厂模式
class A
{
  public function __construct($a, $b)
  {
    echo static::class . implode(',', [$a, $b]);
  }
}

class B
{
  public function __construct($a)
  {
    echo static::class . $a;
  }
}

class Factory
{
  public static function create($className, ...$params)
  {
    return new $className(...$params);
  }
}

Factory::create(A::class, 'ok', 'good');
Factory::create(B::class, 'hey');
