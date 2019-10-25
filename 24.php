<?php
// 模型类与数据表绑定
namespace _24;

use PDO;

class Staff
{
  private $uid;
  private $name;
  private $gender;
  private $age;
  public function __get($name)
  {
    return $this->$name;
  }
  public function __set($name, $value)
  {
    return $this->$name = $value;
  }
  public function __construct()
  {
    $this->age = $this->age . '岁';
    $this->gender = $this->gender ? '男' : '女';
  }
}

$pdo = new PDO('mysql:host=localhost:8889;dbname=haha', 'root', 'root');
$stmt = $pdo->prepare('SELECT * FROM `staff`');
$stmt->setFetchMode(PDO::FETCH_CLASS, Staff::class);
$stmt->execute();
while ($staff = $stmt->fetch()) {
  echo $staff->name . $staff->gender . $staff->age;
  echo '<br>';
}
