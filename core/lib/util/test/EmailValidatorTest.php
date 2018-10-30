<?php
declare(strict_types=1);
namespace core\lib\util\test;

use PHPUnit\Framework\TestCase;
use core\lib\util\validation\EmailValidator;

final class EmailValidatorTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(
            EmailValidator::class,
            EmailValidator::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        EmailValidator::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            EmailValidator::fromString('user@example.com')
        );
    }
}