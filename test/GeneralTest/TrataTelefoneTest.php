<?php
namespace GeneralTest;

use General\Telefone;
use PHPUnit\Framework\TestCase;

class TrataTelefoneTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testCanFormatFixedPhone(): void
    {
        $this->assertEquals('(41)3013-7793', Telefone::formata('4130137793'));
    }

    public function testCanFormatCellphone(): void
    {
        $this->assertEquals('(41)99239-0222', Telefone::formata('41992390222'));
    }

    public function testCanDealWithInvalidPhone(): void
    {
        $this->assertEquals(null, Telefone::formata('413013779377'));
    }
}
