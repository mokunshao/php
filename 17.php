<?php

namespace _17;

// 接口常量

if (!interface_exists(__NAMESPACE__ . '\iDbParam')) {
  interface iDbParam
  {
    const TYPE = 'mysql';
    const HOST = '127.0.0.1:8889';
    const DBNAME = 'haha';
    const USERNAME = 'root';
    const PASSWORD = 'root';
    public static function connection();
  }
}

class DB implements iDbParam
{
  private static $type = iDbParam::TYPE;
  private static $host = iDbParam::HOST;
  private static $dbname = iDbParam::DBNAME;
  private static $username = iDbParam::USERNAME;
  private static $password = iDbParam::PASSWORD;
  public static function connection()
  {
    $dsn = self::$type . ':host=' . self::$host . ';dbname=' . self::$dbname;
    $username = self::$username;
    $password = self::$password;
    return new \PDO($dsn, $username, $password);
  }
}

$db = DB::connection();
$stmt = $db->prepare('SELECT * FROM `test` LIMIT :limit');
$stmt->bindValue('limit', 5, \PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetchAll();
print_r($data);

echo '<hr>';

class DB2 implements iDbParam
{
  public static function connection()
  {
    $dsn = self::TYPE . ':host=' . self::HOST . ';dbname=' . self::DBNAME;
    $username = self::USERNAME;
    $password = self::PASSWORD;
    return new \PDO($dsn, $username, $password);
  }
}

$db2 = DB2::connection();
$stmt2 = $db2->prepare('SELECT * FROM test');
$stmt2->execute();
$data2 = $stmt2->fetchAll();
print_r($data2);
