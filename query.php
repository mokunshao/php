<?php

namespace query;

// 数据库查询类
class Query
{
  // 连接对象
  public $pdo;
  // 表名
  public $table;
  // 字段
  public $field;
  // 条件
  public $where;
  // 数量
  public $limit;
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }
  public function table($table)
  {
    $this->table = $table;
    return $this;
  }
  public function field($field = '*')
  {
    $this->field = $field;
    return $this;
  }
  public function where($where)
  {
    $this->where = empty($where) ? '' : ' WHERE ' . $where;
  }
  public function limit($limit)
  {
    $this->limit = empty($limit) ? '' : ' LIMIT ' . $limit;
    return $this;
  }
  public function select()
  {
    $sql = 'SELECT ' . $this->field . ' FROM ' . $this->table . $this->where . $this->limit;
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    die($stmt->debugDumpParams());
  }
}
