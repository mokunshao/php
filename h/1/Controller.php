<?php
require './Model.php';
require './View.php';
class Controller
{
  public function index()
  {
    $model = new Model();
    $view = new View();
    return $view->render($model->getData());
  }
}
$controller = new Controller();
echo $controller->index();
