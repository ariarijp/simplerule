<?php

namespace Simplerule\Operators\Tests;

class NeqTest extends \PHPUnit_Framework_TestCase
{
    use \Simplerule\Operators\Neq;

    public function testNeqNumber()
    {
        $op = self::neq('a', 80);

        $obj = (object) ['a' => 10];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 79.9];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 80];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 80.1];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 100];
        $this->assertTrue($op($obj));
    }

    public function testNeqString()
    {
        $op = self::neq('name', 'test');

        $obj = (object) ['name' => 'test'];
        $this->assertFalse($op($obj));
        $obj = (object) ['name' => 'foo'];
        $this->assertTrue($op($obj));
    }
}
