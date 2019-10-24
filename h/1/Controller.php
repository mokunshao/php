<?php

namespace _h1;

require './Model.php';
require './View.php';

class Controller
{
  public function index()
  {
    $model = new Model();
    $view = new View();
    $data = $model->getData();
    return $view->render($data);
  }
}
$controller = new Controller();
echo $controller->index();
