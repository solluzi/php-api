<?php
namespace LibTest\validate;

use InvalidArgumentException;
use Validation\InputRequiredValidator;
use PHPUnit\Framework\TestCase;

class ValidaCamposObrigatoriosTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;
   
    // tests
    public function testCanBeCreatedFromValidInput() : void
    {
        $this->assertInstanceOf(
            InputRequiredValidator::class,
            InputRequiredValidator::fromString('Teste')
        );
    }

    public function testCannotBeCreatedFromInvalidInput() : void
    {
        $this->expectException(InvalidArgumentException::class);
        InputRequiredValidator::fromString('');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'Teste',
            InputRequiredValidator::fromString('Teste')
        );
    }
}
