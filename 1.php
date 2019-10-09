<?php
$a = 1;
$b = '2';
$c = true;
$d = null;
$e = array(1, '2');
$f = [1, '2'];
$g = array(
  'a' => '23',
  'b' => '45'
);
$h = [
  'a' => '23',
  'b' => '45'
];
$i = [
  'a' => [
    'aa' => 'aaa',
    'bb' => 'bbb'
  ],
  'b' => array(
    'cc' => 'ccc',
    'dd' => 'ddd'
  ),
];
$title = 'My Title';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title; ?></title>
</head>

<body>
  <?php
  foreach ($g as $key => $value) {
    echo "<div>{$key}:{$value}</div>";
  };
  ?>
  <hr>
  <?php foreach ($g as $key => $value) { ?>
    <div><?php echo $key . ':' . $value; ?></div>
  <?php } ?>
  <hr>
  <?php
  foreach ($i as $key => $value) {
    foreach ($value as $key2 => $value2) {
      echo '<div>' . $key . ' ' . $key2 . ' ' . $value2 . '<div>';
    }
  }
  ?>
  <hr>
  <?php
  var_dump($c);
  ?>
  <hr>
  <?php
  print_r($e);
  ?>
  <hr>
  <?php
  $mike = 'mike';
  echo 'I am "mike"';
  echo '<br>';
  echo "I am 'mike'";
  echo '<br>';
  echo "I am \"mike\"";
  echo '<br>';
  echo 'I am \'mike\'';
  echo '<br>';
  echo 'I am '.$mike.' !';
  echo '<br>';
  echo "I am ${$mike} !";
  ?>
  <hr>
  <?php
  define('NO','1212');
  const OK = '3232';
  echo NO;
  echo '<br>';
  echo OK;
  ?>
</body>

</html>