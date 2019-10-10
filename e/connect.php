<?php
$db = [
  'type' => 'mysql',
  'host' => 'localhost:8889',
  'dbname' => 'haha',
  'username' => 'root',
  'password' => 'root',
];
$dsn = "{$db['type']}:host={$db['host']};dbname={$db['dbname']}";
try {
  $pdo = new PDO($dsn, $db['username'], $db['password']);
} catch (PDOException $e) {
  die($e->getMessage());
}
