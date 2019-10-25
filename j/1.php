<?php
$allowedFileTypes = ['jpg', 'jpeg', 'png'];
$maxFileSize = 3145728;
$filePath = '/uploads/';
$fileName = $_FILES['myFile']['name'];
$tempFile = $_FILES['myFile']['tmp_name'];
$uploadError = $_FILES['myFile']['error'];

if ($uploadError > 0) {
  switch ($uploadError) {
    case 1:
      die('上传文件超过3M');
      break;
    default:
      die('上传文件失败');
      break;
  }
}

$extension = explode('.', $fileName)[1];
if (!in_array($extension, $allowedFileTypes)) {
  die('不允许上传' . $extension . '文件');
}

$fileName = date('YmdHis', time()) . md5(mt_rand(1, 99)) . '.' . $extension;

if (is_uploaded_file($tempFile)) {
  if (move_uploaded_file($tempFile, __DIR__ . $filePath . $fileName)) {
    echo '上传成功';
  } else {
    die('非法操作');
  };
} else {
  die('非法操作');
}

exit();
