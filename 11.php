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
