<?php
require_once __DIR__ . '/connect.php';

$action =  isset($_GET['action']) ? $_GET['action'] : 'index';
$action = htmlentities(strtolower(trim($action)));

switch ($action) {
  case 'login':
    include __DIR__ . '/login.php';
    break;
  case 'check':
    include __DIR__ . '/check.php';
    break;
  case 'logout':
    include __DIR__ . '/logout.php';
    break;
  case 'index':
    include __DIR__ . '/index.php';
    break;
  default:
    include __DIR__ . '/index.php';
    // echo 'default';
    // echo '<script>location.assign("index.php");</script>';
    break;
}
