<?php

namespace Simplerule\Operators\Tests;

class EqTest extends \PHPUnit_Framework_TestCase
{
    use \Simplerule\Operators\Eq;

    public function testEqNumber()
    {
        $op = self::eq('a', 80);

        $obj = (object) ['a' => 10];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 79.9];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 80];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 80.1];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 100];
        $this->assertFalse($op($obj));
    }

    public function testEqString()
    {
        $op = self::eq('name', 'test');

        $obj = (object) ['name' => 'test'];
        $this->assertTrue($op($obj));
        $obj = (object) ['name' => 'foo'];
        $this->assertFalse($op($obj));
    }
}
