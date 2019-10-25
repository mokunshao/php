<?php
class View
{
  public function render($data)
  {
    foreach ($data as $key => $item) {
      echo ($key + 1) . ' : ' . $item['age'] . '岁的' . $item['name'] . '<br>';
    }
  }
}
