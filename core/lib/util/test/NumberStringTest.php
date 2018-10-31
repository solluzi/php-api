<?php
declare(strict_types=1);

namespace core\lib\util\test;
use PHPUnit\Framework\TestCase;
use core\lib\util\general\NumberString;


class NumberStringTest extends TestCase
{
    public function testGetNumber()
    {
        $result = NumberString::getNumber('YTRGFD45');
        $this->assertEquals('45', $result);
    }

    public function testGeString()
    {
        $result = NumberString::getString('YTRGFD45');
        $this->assertEquals('YTRGFD', $result);
    }
}
