<?php

$a = 123;

function fn()
{
  global $a;
  return $a;
}

echo fn();

function fn2()
{
  return $GLOBALS['a'];
}

echo fn2();

function sum($a = 23, $b = 10)
{
  return "{$a}+{$b}=" . ($a + $b);
  // return "$a+$b=" . ($a + $b);
}

echo sum(1, 2);
echo sum(1);
echo sum();

function sum1()
{
  $args = func_get_args();
  $total = 0;
  foreach ($args as $value) {
    $total += $value;
  }
  return $total;
}

echo '<hr>';
echo sum1(1, 2, 22, 9);

function sum2()
{
  $args = func_get_args();
  return array_sum($args);
}

echo '<hr>';
echo sum2(1, 2, 22, 9);

function sum3(...$args)
{
  return array_sum($args);
}

echo '<hr>';
echo sum3(1, 2, 22, 9);

function sum4($a, $b, $c, ...$d)
{
  array_unshift($d, $a, $b, $c);
  return array_sum($d);
}

echo '<hr>';
echo sum4(1, 2, 22, 9, 77);
