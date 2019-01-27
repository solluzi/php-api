<?php
/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 * classe Connection
 * gerencia conexões com bancos de dados através de arquivos de configuração.
 */
namespace Ado;

final class Connection
{
    /**
     * método __cosntruct()
     * não existirão instancias de Connection, por isso estamos mercando-o como private
     */
    private function __construct()
    {
    }

    /**
     * método open()
     * recebe o nome do banco de dados e instancia o objecto PDO correspondente
     */
    public static function open($name)
    {
        // busca o array de conceções
        $config = include "config/config.php";
        $db     = $config[$name];

        // verifica se existe o arquivo de configuração para este banco de dados
        /*if (file_exists("config/{$name}.ini")) {
            // lé o INI e retorna um array
            $db = parse_ini_file("config/{$name}.ini");
        }
        else{
            // se não existir, lança um erro
            throw new \Exception("banco de dados '$name' não encontrado");
        }*/

        // lé as informações contidas no arquivo
        $user = isset($db['user']) ? $db['user'] : null;
        $pass = isset($db['pass']) ? $db['pass'] : null;
        $name = isset($db['name']) ? $db['name'] : null;
        $host = isset($db['host']) ? $db['host'] : null;
        $type = isset($db['type']) ? $db['type'] : null;
        $port = isset($db['port']) ? $db['port'] : null;

        // descobre qual o tipo (driver) de banco de dados a ser utilizado
        switch ($type) {
            case 'pgsql':
                $port = $port ? $port : '5432';
                $conn = new \PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host=$host;port={$port}");
                break;
            case 'mysql':
                $port = $port ? $port : '3306';
                $conn = new \PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass);
                break;
            case 'sqlite':
                $conn = new \PDO("sqlite:{$name}");
                break;
            case 'ibase':
                $conn = new \PDO("firebird:dbname={$name}", $user, $pass);
                break;
            case 'oci8':
                $conn = new \PDO("oci:dbname={$name}", $user, $pass);
                break;
            case 'mssql':
                $conn = new \PDO("mssql:host={$host},1433;dbname={$name}", $user, $pass);
                break;
        }

        // define para que o PDO lance exceções na ocorrência de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // retorna o objeto instanciado
        return $conn;
    }
}
