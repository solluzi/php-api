<?php
declare(strict_types=1);

namespace Validation;

/**
 * @author Mauro Joaquim Miranda <mauro.miranda@solluzi.com.br>
 * @package Validation
 * @license Solluzi soluções integradas
 * @copyright 2018 Solluzi - Soluções integradas
 */

final class EmailValidator
{
    private $email;

    private function __construct(string $email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    public static function fromString(string $email): self
    {
        return new self($email);
    }

    public function __toString(): string
    {
        return $this->email;
    }

    private function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(sprintf('"%s" Email Invalido!', $email));
        }
    }
}
