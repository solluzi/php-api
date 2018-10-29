<?php
/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 * 
 * classe LoggerTXT
 * implementa o algoritmo de LOG em TXT
 */

namespace ado;

use ado\Logger;

class LoggerTXT extends Logger
{
    /**
     * método write()
     * escreve uma mensagem no arquivo de LOG
     *
     * @param $message = mensagem a ser escrita
     * @return void
     */
    public function write($message)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");
        // monta a string
        $text = "$time :: $message\n";
        // adiciona ao final do arquivo
        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}