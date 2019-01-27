<?php
declare(strict_types=1);

namespace LibTest\validate;

use InvalidArgumentException;
use Validation\EmailValidator;
use PHPUnit\Framework\TestCase;

class EmailValidatorTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    // tests
    public function testCanBeCreatedFromValidEmailAddress() : void
    {
        $this->assertInstanceOf(EmailValidator::class, EmailValidator::fromString('contato@solluzi.com.br'));
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);
        EmailValidator::fromString('invalido');
    }

    public function testCanBeUsedAsAsString() : void
    {
        $this->assertEquals('contato@solluzi.com.br', EmailValidator::fromString('contato@solluzi.com.br'));
    }
}
