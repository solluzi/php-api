<?php
declare(strict_types = 1);

namespace Validation;

use InvalidArgumentException;

final class ConfirmPasswordValidator
{
    private $pass;
    private $passcon;

    private function __construct(string $pass, string $confirm)
    {
        $this->ensureAreEqual($pass, $confirm);
        $this->pass = $pass;
        $this->passcon = $confirm;
    }

    public static function fromString($pass, $confirm) : self
    {
        return new self($pass, $confirm);
    }

    public function __toString() : string
    {
        return $this->pass;
    }

    private function ensureAreEqual(string $pass, string $confirm) : void
    {
        if (trim($pass) != trim($confirm)) {
            throw new InvalidArgumentException(sprintf('as "%s" não conferem!', 'Senhas'));
        }
    }
}
