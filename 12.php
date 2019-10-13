<?php

namespace _12;

// 属性重载

class Demo
{
  private $count = 22;
  private $salary = 1500;
  public function __get($name)
  {
    if ($name === 'salary') {
      return '无权查看';
    }
    return $this->$name;
  }
  public function __set($name, $value)
  {
    $this->$name = $value;
  }
  public function __isset($name)
  {
    return isset($this->$name);
  }
  public function __unset($name)
  {
    unset($this->$name);
  }
}

$obj = new Demo();

echo $obj->count, '<hr>';

$obj->count = 33;

echo $obj->count, '<hr>';

var_dump(isset($obj->count));
echo '<hr>';

unset($obj->count);

echo $obj->count, '<hr>';

echo $obj->salary, '<hr>';
