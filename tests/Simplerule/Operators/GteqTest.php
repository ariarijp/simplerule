<?php

namespace Simplerule\Operators\Tests;

class GteqTest extends \PHPUnit_Framework_TestCase
{
    use \Simplerule\Operators\Gteq;

    public function testGteq()
    {
        $op = self::gteq('a', 80);

        $obj = (object) ['a' => 10];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 79.9];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 80];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 80.1];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 100];
        $this->assertTrue($op($obj));
    }
}
