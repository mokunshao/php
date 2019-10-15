<?php

namespace _15;

interface iVehicle
{
  public function setFuel($fuel);
  public function setPurpose($purpose);
}

class Car implements iVehicle
{
  public $fuel;
  public $purpose;
  public function setFuel($fuel)
  {
    $this->fuel = $fuel;
  }
  public function setPurpose($purpose)
  {
    $this->purpose = $purpose;
  }
  public function getInfo()
  {
    return "fuel:{$this->fuel} purpose:{$this->purpose}";
  }
}

class Auto extends Car implements iVehicle
{ }

$car = new Car();
$car->setFuel('汽油');
$car->setPurpose('上班');
echo $car->getInfo(), '<br>';

$auto = new Auto();
$auto->setFuel('电力');
$auto->setPurpose('旅游');
echo $auto->getInfo();
