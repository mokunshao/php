<?php

class One
{
  public function two()
  {
    echo 'two!';
  }
  public function three()
  {
    require_once __DIR__ . '/../views/test.php';
  }
}
