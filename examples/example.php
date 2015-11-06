<?php
require_once __DIR__.'/../vendor/autoload.php';

$rule = new \Simplerule\Simplerule([
    'a eq 10',
    'b eq 100',
    'c gt 500',
]);

$obj = (object) ['a' => 10, 'b' => 100, 'c' => 1000];
var_dump($rule->andEvaluate($obj)); // true

$obj = (object) ['a' => 10, 'b' => 100, 'c' => 300];
var_dump($rule->andEvaluate($obj)); // false

$obj = (object) ['a' => 100, 'b' => 100, 'c' => 10000];
var_dump($rule->andEvaluate($obj)); // false

$obj = (object) ['a' => 10, 'b' => 100, 'c' => 1000];
var_dump($rule->orEvaluate($obj)); // true

$obj = (object) ['a' => 100, 'b' => 100, 'c' => 10000];
var_dump($rule->orEvaluate($obj)); // true
