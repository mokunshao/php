<?php

namespace i3;

// 异常处理

use Exception;

class MyException extends Exception
{
  public function errorInfo()
  {
    // return $this->getCode() . ': ' . $this->getMessage();
    return <<< DOC
    <strong>{$this->getCode()}</strong>
    <div style='color:red;'>{$this->getMessage()}</div>
    DOC;
  }
}

class Calculator
{
  protected $defaultOperators = ['+', '-', '*', '/', '%'];
  protected $result;
  public function __construct(...$operators)
  {
    foreach ($operators as $operator) {
      if (in_array($operator, $this->defaultOperators)) {
        continue;
      } else {
        throw new MyException('请输入正确运算符', 1);
      }
    }
    $this->defaultOperators = $operators;
  }
  public function operaction($type, ...$args)
  {
    if (in_array($type, $this->defaultOperators)) {
      $argsCount = count($args);
      switch ($argsCount) {
        case 0:
          throw new MyException('请输入参数', 2);
        case 1:
          throw new MyException('请输入2个参数', 3);
        default:
          $this->result = array_shift($args);
          if (is_numeric($this->result)) {
            $this->execute($type, ...$args);
          } else {
            throw new MyException('第一个参数必须是数值', 4);
          }
      }
    } else {
      throw new MyException('请输入可选的运算符', 5);
    }
    return round($this->result, 2);
  }
  public function execute($type, ...$args)
  {
    foreach ($args as  $value) {
      if (is_numeric($value)) {
        switch ($type) {
          case '+':
            $this->result += $value;
            break;
          case '-':
            $this->result -= $value;
            break;
          case '*':
            $this->result *= $value;
            break;
          case '/':
            if ($value !== 0 && $value !== '0') {
              $this->result /= $value;
            } else {
              throw new MyException('除数不能为0', 6);
            }
            break;
          case '%':
            $this->result %= $value;
            break;
        }
      } else {
        throw new MyException('操作数类型错误', 7);
      }
    }
  }
}

$calculator = new Calculator('+', '-', '*', '/');

try {
  echo $calculator->operaction('/', 2, '0');
} catch (MyException $e) {
  echo $e->errorInfo();
  echo '<hr>';
  echo $e->getCode() . ': ' . $e->getMessage();
}
