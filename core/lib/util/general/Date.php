<?php
declare(strict_types=1);

namespace General;

final class Date
{

    /**
     * Transform date from Brazilian format to Us
     *
     * @param [type] $value
     * @return string
     */
    public static function date2br($value, $datetime = false) : string
    {
        $tratado = str_replace('/', '-', $value);
        $data   = new \DateTime($tratado);
        if ($datetime) :
            $result = $data->format('d/m/Y H:i:s');
        return $result;
        endif;

        $result = $data->format('d/m/Y');
        return $result;
    }

    /**
     * Transform date from Us form to Brazilian
     *
     * @param [type] $value
     * @return string
     */
    public static function date2us($value, $datetime = false) : string
    {
        if ($datetime) :
            $date = str_replace('/', '-', $value) ;
        $data = new \DateTime($date);
        $result = $data->format('Y-m-d H:i:s');
        return $result;
        endif;
        
        $result = date('Y-m-d', strtotime($value));
        return $result;
    }
}
