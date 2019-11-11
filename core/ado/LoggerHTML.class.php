<?php
declare(strict_types=1);
/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 *
 * classe LoggerHTML
 * implementa o algoritmo de LOG em HTML
 */

namespace Db;

use Db\Logger;

class LoggerHTML extends Logger
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
        $time = date('Y-m-d H:i:s');
        // monta a string
        $text = "<p>\n";
        $text .= "  <b>$time</b> : \n";
        $text .= "  <i>$message</i> <br>\n";
        $text .= "</p>\n";
        // adiciona ao final do arquivo
        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}
