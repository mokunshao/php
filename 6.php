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

function sum($a, $b)
{
  return "{$a}+{$b}=" . ($a + $b);
  // return "$a+$b=" . ($a + $b);
}

echo sum(1, 2);
