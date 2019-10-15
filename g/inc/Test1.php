<?php

namespace inc;

class Test1
{
  public static function get()
  {
    // return __CLASS__ . ' 类加载成功';
    // 以下是同样的效果：
    return self::class . ' 类加载成功';
  }
}
