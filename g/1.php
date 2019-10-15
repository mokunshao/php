<?php

namespace g1;

// 类的自动加载技术

// include './inc/Test1.php';
// include './inc/Test2.php';
// include './inc/Test3.php';

// include __DIR__ . '/inc/Test1.php';
// include __DIR__ . '/inc/Test2.php';
// include __DIR__ . '/inc/Test3.php';

// $path = str_replace('\\', DIRECTORY_SEPARATOR, \inc\Test1::class);
// include __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
// $path = str_replace('\\', DIRECTORY_SEPARATOR, \inc\Test2::class);
// include __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
// $path = str_replace('\\', DIRECTORY_SEPARATOR, \inc\Test3::class);
// include __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';

spl_autoload_register(function ($class) {
  $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  $path = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
  if (file_exists($path)) include $path;
});

echo \inc\Test1::get(), '<br>';
echo \inc\Test2::get(), '<br>';
echo \inc\Test3::get(), '<br>';
