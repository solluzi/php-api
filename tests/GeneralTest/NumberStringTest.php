<?php
namespace GeneralTest;

use General\NumberString;
use PHPUnit\Framework\TestCase;

class NumberStringTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $string;

    protected function setUp()
    {
        $this->string = '1kjhgfffd2jheerg3euriuyr4gfgfs0kdhkfh5iuyiueyui8ACGZ';
    }

    // remove letras e busca apenas números
    public function testGetOnlyNumber()
    {
        $numeros = NumberString::getNumber($this->string);
        $this->assertEquals('1234058', $numeros);
    }

    /**
     * Remove todos os caracteres alfanumericos
     *
     * @return void
     */
    public function testGetOnlyLetters()
    {
        $letras = NumberString::getString($this->string);
        $this->assertEquals('kjhgfffdjheergeuriuyrgfgfskdhkfhiuyiueyuiACGZ', $letras);
    }
}
