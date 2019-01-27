<?php
namespace LibTest\general;

use General\CPF;
use PHPUnit\Framework\TestCase;

class TratamentoDeCpfTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $cpfPontuado;
    protected $cpfSemPontuacao;
    protected $cpfMaiorQueOnzeDigitos;
    protected $cpfMenorQueOnzeDigitos;
    
    protected function setUp()
    {
        $this->cpfPontuado            = "764.901.290-51";
        $this->cpfSemPontuacao        = "76490129051";
        $this->cpfMaiorQueOnzeDigitos = "764901290510";
        $this->cpfMenorQueOnzeDigitos = "7649012905";
    }

    /**
     * Informamos um CPF sem pontuação
     * Deve retornar o CPF Pontuado
     *
     * @return void
     */
    public function testPontuarCpfSemPontuacao()
    {
        $result = CPF::pontuado($this->cpfSemPontuacao);
        $this->assertEquals('764.901.290-51', $result);
    }

    public function testPontuarCpfPontuado()
    {
        $result = CPF::pontuado($this->cpfPontuado);
        $this->assertEquals('764.901.290-51', $result);
    }

    public function testCpfMenorQueOnzeDigitos()
    {
        $result = CPF::pontuado($this->cpfMenorQueOnzeDigitos);
        $this->assertEquals(null, $result);
    }

    public function testCpfMaiorQueOnzeDigitos()
    {
        $result = CPF::pontuado($this->cpfMaiorQueOnzeDigitos);
        $this->assertEquals(null, $result);
    }

    public function testNaoPontuarCpfPontuado()
    {
        $result = CPF::naoPontuado($this->cpfPontuado);
        $this->assertEquals('76490129051', $result);
    }

    public function testNaoPontuarCpfSemPontuado()
    {
        $result = CPF::naoPontuado($this->cpfSemPontuacao);
        $this->assertEquals('76490129051', $result);
    }

    public function testNaoPontuarCpfMaiorQueOnze()
    {
        $result = CPF::naoPontuado($this->cpfMaiorQueOnzeDigitos);
        $this->assertEquals(null, $result);
    }

    public function testNaoPontuarCpfMenorQueOnze()
    {
        $result = CPF::naoPontuado($this->cpfMenorQueOnzeDigitos);
        $this->assertEquals(null, $result);
    }
}
