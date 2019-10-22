<?php
namespace GeneralTest;

use General\CNPJ;
use PHPUnit\Framework\TestCase;

class TratamentoDeCnpjTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $cnpjFormatado;
    protected $cnpjNaoFormatado;
    protected $cnpjMaiorQueQuatorzeCaracteres;
    protected $cnpjMenorQueQuatorzeCaracteres;

    protected function setUp()
    {
        $this->cnpjFormatado                    = '31.947.682/0001-78';
        $this->cnpjNaoFormatado                 = '31947682000178';
        $this->cnpjMaiorQueQuatorzeCaracteres   = '319476820001789';
        $this->cnpjMenorQueQuatorzeCaracteres   = '3194768200017';
    }

    // tests
    public function testRetirarFormatacao()
    {
        $result = CNPJ::naoPontuado($this->cnpjFormatado);
        $this->assertEquals('31947682000178', $result);
    }

    public function testFormatarCnpj()
    {
        $result = CNPJ::pontuado($this->cnpjNaoFormatado);
        $this->assertEquals('31.947.682/0001-78', $result);
    }

    public function testInvalidarCnpjMaiorDeQuatorzeCaracteres()
    {
        $result = CNPJ::naoPontuado($this->cnpjMaiorQueQuatorzeCaracteres);
        $this->assertEquals(null, $result);
    }

    public function testInvalidarCnpjMenorDeQuatorzecaracteres()
    {
        $result = CNPJ::pontuado($this->cnpjMenorQueQuatorzeCaracteres);
        $this->assertEquals(null, $result);
    }
}
