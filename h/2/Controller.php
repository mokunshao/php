<?php

namespace _h2;

require './Model.php';
require './View.php';
class Controller
{
  // 依赖注入
  public function index(View $view, Model $model)
  {
    $data = $model->getData();
    return $view->render($data);
  }
}
$model = new Model();
$view = new View();
$controller = new Controller();
echo $controller->index($view, $model);
