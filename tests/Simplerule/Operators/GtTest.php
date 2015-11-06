<?php

namespace Simplerule\Operators\Tests;

class GtTest extends \PHPUnit_Framework_TestCase
{
    use \Simplerule\Operators\Gt;

    public function testGt()
    {
        $op = self::gt('a', 80);

        $obj = (object) ['a' => 10];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 79.9];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 80];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 80.1];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 100];
        $this->assertTrue($op($obj));
    }
}
