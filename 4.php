<?php
// include __DIR__ . '/3.php';
// require_once __DIR__ . '/3.php';
// include_once __DIR__ . '/3.php';
require __DIR__ . '/3.php';

$sql = 'SELECT * FROM test';
$stmt = $pdo->prepare($sql);
var_dump($stmt);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
var_dump($data);
echo '</pre>';
foreach ($data as $key => $value) {
  foreach ($value as $key2 => $value2) {
    echo "<div>{$key2}:{$value2}</div>";
  }
}
echo '<hr>';
var_dump($stmt->rowCount());
echo '<hr>';

echo '<pre>';
print_r($_SERVER);
echo '</pre>';

$sql = 'INSERT INTO `test` SET `name`=:name, `score`=:score';
$stmt = $pdo->prepare($sql);
var_dump($stmt);
$name = 'xiaoming';
$score = 777;
$stmt->bindParam('name', $name, PDO::PARAM_STR);
$stmt->bindParam('score', $score, PDO::PARAM_INT);
// if ($stmt->execute()) {
//   if ($stmt->rowCount() > 0) {
//     echo $pdo->lastInsertId();
//     echo '成功';
//   } else {
//     echo '没有要修改的数据';
//   }
// } else {
//   print_r($stmt->errorInfo());
//   echo '失败';
// };
