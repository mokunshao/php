<?php

namespace _9;

class People
{
  public $country = 'china';
  public $name;
  public function __construct($name)
  {
    $this->name = $name;
    $this->gender = 'male';
    echo $this->getInfo();
  }
  public function getInfo()
  {
    return $this->gender . ' ' . $this->name . ' live in ' . $this->country;
  }
}

$jack = new People('jack');
var_dump($jack);
var_dump($jack->getInfo());

class Student extends People
{
  public function __construct($name, $age)
  {
    parent::__construct($name);
    $this->age = $age;
  }
  public function getInfo()
  {
    return 'Hi! My name is ' . $this->name . ' ' . parent::getInfo();
  }
}
$dan = new Student('dan', 18);
var_dump($dan);
