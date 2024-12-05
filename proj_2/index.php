<?php
require_once __DIR__.'/vendor/autoload.php';

$human = new \App\Human();
$human->showInfo();
$academy = new \App\Academy();
$academy->showInfo();
echo PHP_EOL.'Код продолжает выполнение...'.PHP_EOL;

$a = 10;

function sum ($a, $b)
{
    return $a + $b;
}

//echo sum(5, 2);

function increment ($value)
{
    ++$value;
}

$val = 10;
increment($val);
echo $val;

function change(&$arr)
{
    $arr[0] = 100;
    print_r($arr);
}

$arr = [1,2,3];
change($arr);
print_r($arr);