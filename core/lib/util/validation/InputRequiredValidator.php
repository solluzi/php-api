<?php
declare(strict_types=1);

namespace Validation;

use InvalidArgumentException;

final class InputRequiredValidator
{
    private $input;

    private function __construct(string $input)
    {
        $this->ensureIsRequiredInput($input);
        $this->input = $input;
    }

    public static function fromString(string $input): self
    {
        return new self($input);
    }

    public function __toString(): string
    {
        return $this->input;
    }

    private function ensureIsRequiredInput(string $input) : void
    {
        if (trim($input) == null) {
            throw new InvalidArgumentException(sprintf('"%s" obrigatório!', $input));
        }
    }
}
