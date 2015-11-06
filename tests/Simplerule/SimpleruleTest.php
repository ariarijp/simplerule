<?php

namespace Simplerule\Tests;

class SimpleruleTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $conditions = [
            'a gteq 80',
            'b gteq 1000',
            'c gteq 10000',
        ];

        $rule = new \Simplerule\Simplerule($conditions);

        $obj = (object) ['a' => 10, 'b' => 1000, 'c' => 1000];
        $this->assertFalse($rule->evaluate($obj));

        $obj = (object) ['a' => 100, 'b' => 1000, 'c' => 10000];
        $this->assertTrue($rule->evaluate($obj));
    }

    public function testGetConditions()
    {
        $conditions = [
            'a gteq 80',
            'b gteq 1000',
        ];

        $rule = new \Simplerule\Simplerule($conditions);
        $this->assertEquals(2, count($rule->getConditions()));
    }

    public function testAddCondition()
    {
        $rule = new \Simplerule\Simplerule([]);
        $rule->addCondition(\Simplerule\Operators::eq('a', 80));

        $this->assertEquals(1, count($rule->getConditions()));
    }

    public function testAddConditions()
    {
        $rule = new \Simplerule\Simplerule([]);
        $rule->addConditions([
            \Simplerule\Operators::eq('a', 80),
            \Simplerule\Operators::eq('b', 1000),
        ]);

        $this->assertEquals(2, count($rule->getConditions()));
    }

    public function testAndEvaluate()
    {
        $conditions = [
            'a gteq 80',
            'b gteq 1000',
            'c gteq 10000',
        ];

        $rule = new \Simplerule\Simplerule($conditions);

        $obj = (object) ['a' => 10, 'b' => 1000, 'c' => 1000];
        $this->assertFalse($rule->andEvaluate($obj));

        $obj = (object) ['a' => 100, 'b' => 1000, 'c' => 1000];
        $this->assertFalse($rule->andEvaluate($obj));

        $obj = (object) ['a' => 10, 'b' => 100, 'c' => 1000];
        $this->assertFalse($rule->andEvaluate($obj));

        $obj = (object) ['a' => 100, 'b' => 1000, 'c' => 10000];
        $this->assertTrue($rule->andEvaluate($obj));
    }

    public function testOrEvaluate()
    {
        $conditions = [
            'a gteq 80',
            'b gteq 1000',
            'c gteq 10000',
        ];

        $rule = new \Simplerule\Simplerule($conditions);

        $obj = (object) ['a' => 10, 'b' => 1000, 'c' => 1000];
        $this->assertTrue($rule->orEvaluate($obj));

        $obj = (object) ['a' => 100, 'b' => 100, 'c' => 1000];
        $this->assertTrue($rule->orEvaluate($obj));

        $obj = (object) ['a' => 10, 'b' => 100, 'c' => 10000];
        $this->assertTrue($rule->orEvaluate($obj));

        $obj = (object) ['a' => 10, 'b' => 100, 'c' => 1000];
        $this->assertFalse($rule->orEvaluate($obj));
    }
}
