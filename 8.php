<?php

include __DIR__ . '/7.php';

function hello()
{
  return 'hello world';
}

echo hello();
echo '<hr>';
echo \hello();
echo '<hr>';
echo \_7\hello();
echo '<hr>';
echo _7\hello();
