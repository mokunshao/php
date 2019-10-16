<?php

namespace _18;

// 后期静态绑定

class A
{
  public static function who()
  {
    echo __CLASS__;
  }
  public static function say()
  {
    // self 和 static 的结果不同，建议用 static
    // self::who();
    static::who();
  }
}
class B extends A
{
  public static function who()
  {
    echo __CLASS__;
  }
}

B::say();
