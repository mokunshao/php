<?php

namespace _14;

// 抽象类

abstract class People
{
  protected $name;
  public function __construct($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  abstract function setName($name);
}

class Student extends People
{
  public function __construct($name)
  {
    parent::__construct($name);
  }
  public function setName($name)
  {
    $this->name = $name;
  }
}

$student = new Student('Jack');
print_r($student);
echo $student->getName();
$student->setName('Mike');
echo $student->getName();
