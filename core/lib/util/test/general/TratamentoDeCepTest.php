<?php
namespace LibTest\general;

use General\CEP;
use PHPUnit\Framework\TestCase;

class TratamentoDeCepTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $cep;
    protected $cepNaoFormatado;
    protected $cepMaiorQueNove;
    protected $cepMenorQueOito;
    
    protected function setUp()
    {
        $this->cep             = '80100-240';
        $this->cepNaoFormatado = '80100240';
        $this->cepMaiorQueNove = '8010024567';
        $this->cepMenorQueOito = '8010024';
    }

    // tests
    public function testFormataCep()
    {
        $result = CEP::pontuado($this->cepNaoFormatado);
        $this->assertEquals('80100-240', $result);
    }

    public function testRemoveFormatacaoDoCep()
    {
        $result = CEP::naoPontuado($this->cep);
        $this->assertEquals('80100240', $result);
    }

    public function testInvalidaCepMaiorQueNoveCaracteres()
    {
        $result = CEP::naoPontuado($this->cepMaiorQueNove);
        $this->assertEquals(null, $result);
    }

    public function testInvalidaCepMenorQueOitoCaracteres()
    {
        $result = CEP::naoPontuado($this->cepMenorQueOito);
        $this->assertEquals(null, $result);
    }
}
