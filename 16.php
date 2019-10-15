<?php

namespace _16;

use PDO;

interface iCURD
{
  public function create($data);
  public function read();
  public function update($data, $where);
  public function delete($where);
}

class DB implements iCURD
{
  protected $pdo;
  protected $table;
  public function __construct($dsn, $username, $password, $table)
  {
    $this->pdo = new PDO($dsn, $username, $password);
    $this->table = $table;
  }
  public function create($data)
  {
    $field = ' (name, score) ';
    $values = ' (:name, :score) ';
    $sql = 'INSERT INTO ' . $this->table . $field . ' VALUES ' . $values;
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);
    return [
      'count' => $stmt->rowCount(),
      'id' => $this->pdo->lastInsertId()
    ];
  }
  public function read($field = '*', $where = '', $limit = '')
  {
    $where = empty($where) ? '' : ' WHERE ' . $where;
    $limit = empty($limit) ? '' : ' LIMIT ' . $limit;
    $sql = 'SELECT ' . $field . ' FROM ' . $this->table  . $where . $limit;
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function update($data, $where)
  {
    $set = '';
    foreach ($data as $key => $value) {
      $set .= $key . ' = :' . $key . ', ';
    }
    $set = rtrim($set, ', ');
    $sql = 'UPDATE ' . $this->table . ' SET ' . $set . ' WHERE ' . $where;
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);
    return $stmt->rowCount();
  }
  public function delete($where)
  {
    $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
  }
}

$db = new DB('mysql:host=localhost:8889;dbname=haha', 'root', 'root', 'test');

// print_r($db->create(['name' => '小明', 'score' => 12]));
// print_r($db->delete('uid = 18'));
// print_r($db->read('name, uid', 'uid > 3', '0,6'));
// print_r($db->update(['name' => 'mika', 'score' => 666], 'uid = 10'));
