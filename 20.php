<?php

// trait
namespace _20;

use PDO;

trait Db
{
  public function connect($dsn, $username, $password)
  {
    return new PDO($dsn, $username, $password);
  }
}

trait Query
{
  public function get(PDO $pdo, $where = '')
  {
    $where = empty($where) ? '' : ' WHERE ' . $where;
    $stmt = $pdo->prepare('SELECT * FROM `test` ' . $where);
    var_dump($stmt);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

class A
{
  use Db;
  use Query;
  public $pdo = null;
  public function __construct($dsn, $username, $password)
  {
    $this->pdo = $this->connect($dsn, $username, $password);
  }
  public function find($where = '')
  {
    return $this->get($this->pdo, $where);
  }
}

$dsn = 'mysql:host=localhost:8889;dbname=haha;';
$username = 'root';
$password = 'root';
$a = new A($dsn, $username, $password);

var_dump($a->find('name like "%qq%"'));
