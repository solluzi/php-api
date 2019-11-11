<?php
declare(strict_types=1);

/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 *
 */
namespace Validation;

use InvalidArgumentException;

final class CNPJValidator
{
    //
    private $cnpj;

    /**
     * Undocumented function
     *
     * @param string $cnpj
     */
    private function __construct(string $cnpj)
    {
        $this->ensureIsValidCnpj($cnpj);
        $this->cnpj = $cnpj;
    }

    /**
     * Undocumented function
     *
     * @param string $cnpj
     * @return self
     */
    public static function fromString(string $cnpj): self
    {
        return new self($cnpj);
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->cnpj;
    }

    /**
     * Undocumented function
     *
     * @param string $cnpj
     * @return void
     */
    private function ensureIsValidCnpj(string $cnpj):void
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        // valida tamanho
        if (strlen($cnpj) != 14) :
            throw new InvalidArgumentException(sprintf('"%" O CNPJ é invalido', $cnpj));
        endif;

        // valida primeiro digito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) :
            throw new InvalidArgumentException(sprintf('"%" O CNPJ é invalido', $cnpj));
        endif;

        // valida o segundo digito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;
        $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }
}
