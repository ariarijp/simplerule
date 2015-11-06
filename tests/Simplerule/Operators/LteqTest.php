<?php

namespace Simplerule\Operators\Tests;

class LteqTest extends \PHPUnit_Framework_TestCase
{
    use \Simplerule\Operators\Lteq;

    public function testLteq()
    {
        $op = self::lteq('a', 80);

        $obj = (object) ['a' => 10];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 79.9];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 80];
        $this->assertTrue($op($obj));
        $obj = (object) ['a' => 80.1];
        $this->assertFalse($op($obj));
        $obj = (object) ['a' => 100];
        $this->assertFalse($op($obj));
    }
}
