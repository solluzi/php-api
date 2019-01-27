<?php
declare(strict_types=1);

namespace LibTest\validate;

use InvalidArgumentException;
use Validation\CNPJValidator;
use PHPUnit\Framework\TestCase;

class ValidaCnpjTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testCanBeCreatedFromValidCnpj(): void
    {
        $this->assertInstanceOf(
            CNPJValidator::class,
            CNPJValidator::fromString('11.444.777/0001-61')
        );
    }

    public function testCannotBeCreatedFromInvalidCnpj(): void
    {
        $this->expectException(InvalidArgumentException::class);
        CNPJValidator::fromString('11.111.111/1111-11');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            '11.444.777/0001-61',
            CNPJValidator::fromString('11.444.777/0001-61')
        );
    }
}
