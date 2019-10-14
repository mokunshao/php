<?php

namespace db;

use query\Query;

use PDO;

require 'query.php';

class DB
{
  protected static $pdo;
  public static function connection()
  {
    self::$pdo = new PDO('mysql:host=localhost:8889;dbname=haha', 'root', 'root');
  }
  public static function __callStatic($name, $args)
  {
    self::connection();
    $query = new Query(self::$pdo);
    return call_user_func_array([$query, $name], $args);
  }
}

DB::table('test')->select();
