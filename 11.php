<?php

namespace _11;

class Demo
{
  public static $price = 1200;
}

echo Demo::$price;

echo '<hr>';

$obj = new Demo();
print_r($obj);

echo '<hr>';

class Demo2
{
  public static $price;
  function __construct($price)
  {
    self::$price = $price;
  }
  public static function getPrice()
  {
    return self::$price;
  }
}

$obj2 = new Demo2(123);
print_r($obj2);
echo Demo2::getPrice();
echo Demo2::$price;

class Demo3
{
  const ABC = 123;
  static $DEF = 456;
  static function getABC()
  {
    return [self::ABC, self::$DEF];
  }
}

echo Demo3::ABC;
echo Demo3::$DEF;
print_r(Demo3::getABC());