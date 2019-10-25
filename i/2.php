<?php

namespace i2;

// 异常处理

use Exception;

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
        throw new Exception('请输入正确运算符', 1);
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
          throw new Exception('请输入参数', 2);
        case 1:
          throw new Exception('请输入2个参数', 3);
        default:
          $this->result = array_shift($args);
          if (is_numeric($this->result)) {
            $this->execute($type, ...$args);
          } else {
            throw new Exception('第一个参数必须是数值', 4);
          }
      }
    } else {
      throw new Exception('请输入可选的运算符', 5);
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
              throw new Exception('除数不能为0', 6);
            }
            break;
          case '%':
            $this->result %= $value;
            break;
        }
      } else {
        throw new Exception('操作数类型错误', 7);
      }
    }
  }
}

$calculator = new Calculator('+', '-', '*', '/');
echo $calculator->operaction('/', 2, '0');
