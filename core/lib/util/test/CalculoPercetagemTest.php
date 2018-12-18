<?php
declare(strict_types=1);

namespace core\lib\util\test;

use PHPUnit\Framework\TestCase;
use core\lib\util\general\CalculoPercentagem;

class CalculoPercetagemTest extends TestCase
{

    public function testXn()
    {
        $resultado = CalculoPercentagem::porcentagemXn(10, 20);
        $this->assertEquals(2, $resultado);
    }

    public function testNx()
    {
        $result = CalculoPercentagem::porcentagemNx(2, 20);
        $this->assertEquals(10, $result);
    }

    public function testNnx()
    {
        $data = CalculoPercentagem::porcentagemNnx(10, 10);
        $this->assertEquals(100, $data);
    }
}