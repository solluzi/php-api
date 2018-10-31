<?php
declare(strict_types=1);

use core\lib\util\general\Date;
use PHPUnit\Framework\TestCase;


class DateTest extends TestCase
{
    public function testDate2Br()
    {
        $result = Date::date2br(date('Y-m-d'));
        $expected = date('d/m/Y');
        $this->assertEquals($expected, $result);
    }

    public function testDate2Us()
    {
        $result = Date::date2us(date('d/m/Y'));
        $expected = date('Y-m-d');
        $this->assertEquals($expected, $result);
    }
}
