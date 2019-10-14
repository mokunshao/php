<?php

namespace _13;

function sum($a, $b)
{
  return "{$a} + {$b} = " . ($a + $b);
}

echo sum(12, 34), '<hr>';

echo call_user_func(__NAMESPACE__ . '\sum', 1, 2), '<hr>';

echo call_user_func_array(__NAMESPACE__ . '\sum', [1, 2]), '<hr>';

class Test
{
  public function sum($a, $b)
  {
    return "{$a} + {$b} = " . ($a + $b);
  }
}

$obj = new Test();

echo call_user_func_array([$obj, 'sum'], [1, 3]), '<hr>';
echo call_user_func_array([new Test(), 'sum'], [1, 3]), '<hr>';

class Test2
{
  public static function sum($a, $b)
  {
    return "{$a} + {$b} = " . ($a + $b);
  }
}

echo call_user_func_array(__NAMESPACE__ . '\Test2::sum', [1, 3]), '<hr>';
echo call_user_func_array([Test2::class, 'sum'], [1, 3]), '<hr>';

// 方法重载

class Demo
{
  public function __call($name, $args)
  {
    return $name . print_r($args, true);
  }
  public static function __callStatic($name, $args)
  {
    return $name . print_r($args, true);
  }
}

$demo = new Demo();
echo $demo->getInfo1(12, 34), '<hr>';
echo Demo::getInfo2(24, 68), '<hr>';
