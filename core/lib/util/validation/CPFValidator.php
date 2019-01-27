<?php
declare(strict_types=1);
/**
 * @author Mauro Miranda <mauro.miranda@solluzi.com.br>
 * @license MIT
 * @package category
 */
namespace Validation;

use InvalidArgumentException;

final class CPFValidator
{
    private $cpf;

    private function __construct(string $cpf)
    {
        $this->ensureIsValidCpf($cpf);
        $this->cpf = $cpf;
    }

    public static function fromString(string $cpf): self
    {
        return new self($cpf);
    }

    public function __toString(): string
    {
        return $this->cpf;
    }

    private function ensureIsValidCpf(string $cpf): void
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%" CPF Invalido',
                    $cpf
                )
            );
        }

        // Verifica se foi informado uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%" CPF Invalido',
                    $cpf
                )
            );
        }

        // Faz o calculo para validar o cpf
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                throw new InvalidArgumentException(
                    sprintf(
                        '"%" CPF Invalido',
                        $cpf
                    )
                );
            }
        }
    }
}
