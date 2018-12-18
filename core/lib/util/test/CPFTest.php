<?php
declare(strict_types=1);

namespace core\lib\util\test;

use core\lib\util\general\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    public function testPontuado()
    {
        $result = CPF::pontuado('38574136034');
        $this->assertEquals('385.741.360-34', $result);
    }

    public function testNaoPontuado()
    {
        $result = CPF::naoPontuado('385.741.360-34');
        $this->assertEquals('38574136034', $result);
    }
}
