<?php

namespace _10;

class Demo
{
  public $name;
  protected $position;
  private $salary;
  protected $department;
  public function __construct($name, $position, $salary, $department)
  {
    $this->name = $name;
    $this->position = $position;
    $this->salary = $salary;
    $this->department = $department;
  }
  public function getPosition()
  {
    return $this->position;
  }
  public function getSalary()
  {
    return $this->salary;
  }
  public function getDepartment()
  {
    return $this->department;
  }
}

$obj = new Demo('jack', 'FE', 1500, 'IT');
var_dump($obj);
var_dump($obj->getPosition());
var_dump($obj->getSalary());
var_dump($obj->getDepartment());
echo '<hr>';

class Sub extends Demo
{
  public function display()
  {
    return [
      $this->name,
      // $this->salary, // 无法访问
      $this->department,
      $this->position
    ];
  }
}

$obj2 = new Sub('mike', 'HR', 1800, 'NO');
var_dump($obj2->display());
