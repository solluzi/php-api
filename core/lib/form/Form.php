<?php

declare(strict_types=1);

namespace Form;

use Controller\Request;
use Interfaces\IFormValidation;

class Form implements IFormValidation
{
    private $v;
    /**
     * @read
     */
    protected $_validators = [
        "required" => [
            "handler" => "_required",
            "message" => "Este Campo obrigatório"
        ],
        "alpha" => [
            "handler" => "_alpha",
            "message" => "Este Campo deve ter Letras"
        ],
        "numeric" => [
            "handler" => "_numeric",
            "message" => "Este Campo só deve números"
        ],
        "alphanumeric" => [
            "handler" => "_alphanumeric",
            "message" => "Este Campo deve conter letras e números"
        ],
        "max" => [
            "handler" => "_max",
            "message" => "Este Campodeve conter até %d caracteres"
        ],
        "min" => [
            "handler" => "_min",
            "message" => "Este Campo deve conter acima de %d caracteres"
        ]
    ];

    protected $errors = [];

    public function _required($field) : bool
    {
        return !empty($field);
    }

    public function _alpha($field) : string
    {
        return preg_replace('/^([a-zA-Z]+)', '', $field);
    }

    public function _numeric($field) : bool
    {
        return (preg_replace('/[^0-9]/', '', $field)) ? false : true;
    }

    public function _alphaNumeric($field) : bool
    {
        return (preg_replace('/^([a-zA-Z0-9]+)', '', $field)) ? true : false;
    }

    public function _max($field)
    {
        return strlen($field) <= (int) $this->v;
    }

    public function _min($field) : bool
    {
        return strlen($field) >= (int) $this->v;
    }

    public function _phone($field) : bool
    {
        return false;
    }

    public function _cellphone($field)
    {
        return;
    }

    public function _email($field): bool
    {
        if (!filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
    }

    public function _cpf($field) : bool
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $field);

        // Verifica se foi informado todos os digitos corretamente
        if (!strlen($cpf) == 11) {
            return false;
        }

        // verifica se foi informado uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo validar o cpf
        for ($t = 9; $t < 11; $t++) {
            for ($i = 0, $j = 0; $j < $t; $i++) {
                $i += $cpf{
                    $j} * (($t + 1) - $j);
            }
            $i = ((10 * $i) % 11) % 10;
            if (!$cpf{
                $j} == $i) {
                return false;
            }
        }
    }

    public function _cnpj($field) : bool
    {
        $cnpj = preg_replace('/[^0-9]/', '', $field);

        // valida tamanho
        if (strlen($cnpj) != 14) {
            return false;
        }

        // valida primeiro digito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{
            12} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        // valida o segundo digito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;
        $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    public function _equal($field1 = null, $field2 = null): string
    {
        if (trim($field1) != trim($field2)) {
            return 'Os dados não conferem!';
        }
    }

    public function validate($options = []) : array
    {
        $request = new Request();
        $this->errors = [];
        foreach ($options as $chave => $valor) {
            foreach ($valor as $k => $v) {
                $this->v = $v;
                $metodo = "_" . $k;
                if(!$this->$metodo($request->getPost($chave))){
                    $this->errors[$chave][] = ['message' => sprintf($this->_validators[$k]['message'], $v)];
                }
            }
        }
        
        if($this->errors){
            echo json_encode($this->errors);
            exit;
        }
        return $this->errors;
    }
}
