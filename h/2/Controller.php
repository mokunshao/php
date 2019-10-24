<?php
require './Model.php';
require './View.php';
class Controller
{
  // 依赖注入
  public function index(View $view, Model $model)
  {
    return $view->render($model->getData());
  }
}
$model = new Model();
$view = new View();
$controller = new Controller();
echo $controller->index($view, $model);
