<?php

namespace _h3;

require './Model.php';
require './View.php';
class Controller
{
  // 依赖注入
  protected $view = null;
  protected $model = null;
  public function __construct(View $view, Model $model)
  {
    $this->view = $view;
    $this->model = $model;
  }
  public function index()
  {
    $data = $this->model->getData();
    return $this->view->render($data);
  }
}
$model = new Model();
$view = new View();
$controller = new Controller($view, $model);
echo $controller->index();
