<?php
namespace util\validation;

class DataValidate
{
    public $_errors = [];

    /**
     * Undocumented function
     *
     * @param [type] $label
     * @param [type] $value
     * @return void
     */
    public function _validateRequired($label, $value)
    {
        if (empty($value)) {
            $this->_errors[$label] = ["msg" => "O campo {$label} é obrigatório"];
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $label
     * @param [type] $value
     * @return void
     */
    public function _validateCnpj($label, $value)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        // valida tamanho
        if (strlen($cnpj) != 14) :
            $this->_errors[$label] = ["msg" => "O CNPJ é invalido"];
        endif;

        // valida primeiro digito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj{
            12} != ($resto < 2 ? 0 : 11 - $resto)) :
            $this->_errors[$label] = ["msg" => "O CNPJ é invalido"];
        endif;

        // valida o segundo digito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;
        $cnpj{
            13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    /**
     * Undocumented function
     *
     * @param [type] $label
     * @param [type] $value
     * @return void
     */
    public function _validateEmail($label, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->_errors[$label] = ["msg" => "Este e-mail é invalido!"];
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function validate()
    {

        if ($this->_errors) {
            return false;
        }
        return true;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getErrors()
    {
        return $this->_errors;
    }
}
