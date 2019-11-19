<?php
declare (strict_types = 1);
namespace GeneralTest;

use General\Percentagem;
use PHPUnit\Framework\TestCase;

class CalculoPorcentagemTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * Quanto é X% de N?
     *
     * @return void
     */
    public function testPorcentagemXn()
    {
        $resultado1 = Percentagem::porcentagemXn(10, 60);
        $this->assertEquals('6.00', $resultado1);
    }

    /**
     * N é X% de N
     *
     * @return void
     */
    public function testPorcentagemNx()
    {
        $resultado2 = Percentagem::porcentagemNx(10, 75);
        $this->assertEquals('13.333333333333334', $resultado2);
    }

    /**
     * N é N% de X
     *
     * @return void
     */
    public function testPorcentagemNnx()
    {
        $resultado3 = Percentagem::porcentagemNnx(6, 10);
        $this->assertEquals('60.00', $resultado3);
    }
}
