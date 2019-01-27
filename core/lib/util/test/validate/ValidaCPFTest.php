<?php
declare(strict_types=1);
namespace LibTest\validate;

use Validation\CPFValidator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ValidaCPFTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testCanBeCreatedFromValidCpf(): void
    {
        $this->assertInstanceOf(
            CPFValidator::class,
            CPFValidator::fromString('975.209.510-06')
        );
    }

    public function testCannotBeCreatedFromInvalidCpf(): void
    {
        $this->expectException(InvalidArgumentException::class);
        CPFValidator::fromString('111.111.111-11');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            '975.209.510-06',
            CPFValidator::fromString('975.209.510-06')
        );
    }
}
