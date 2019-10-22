<?php
<<<<<<< HEAD
$adapter = getenv('d_adapter');
$host = getenv('d_host');
$name = getenv('d_name');
$user = getenv('d_user');
$pass = getenv('d_pass');
$port = getenv('d_port');
$charset = getenv('d_charset');
echo getenv('PHINX_DBFOLDER');
=======
>>>>>>> b90c120a6682d1886c49803ad92ddd4da1bf69a0
return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations/' . (isset($_SERVER['PHINX_DBFOLDER']) ? $_SERVER['PHINX_DBFOLDER'] : ''),
        'seeds'      => '%%PHINX_CONFIG_DIR%%/db/seeds/' . (isset($_SERVER['PHINX_DBFOLDER']) ? $_SERVER['PHINX_DBFOLDER'] : ''),
    ],
    'environments' => [
        'default_migration_table'   => 'phinxlog',
        'default_database'          => 'default',
        'default' => [
<<<<<<< HEAD
            'adapter' => isset($adapter) ? $adapter   : '',
            'host'    => isset($host)    ? $host      : '',
            'name'    => isset($name)    ? $name      : '',
            'user'    => isset($user)    ? $user      : '',
            'pass'    => isset($pass)    ? $pass      : '',
            'port'    => isset($port)    ? $port      : '',
            'charset' => isset($charset) ? $charset   : '',
=======
            'adapter' => isset($_SERVER['PHINX_DBADAPTER']) ? $_SERVER['PHINX_DBADAPTER']   : '',
            'host'    => isset($_SERVER['PHINX_DBHOST'])    ? $_SERVER['PHINX_DBHOST']      : '',
            'name'    => isset($_SERVER['PHINX_DBNAME'])    ? $_SERVER['PHINX_DBNAME']      : '',
            'user'    => isset($_SERVER['PHINX_DBUSER'])    ? $_SERVER['PHINX_DBUSER']      : '',
            'pass'    => isset($_SERVER['PHINX_DBPASS'])    ? $_SERVER['PHINX_DBPASS']      : '',
            'port'    => isset($_SERVER['PHINX_DBPORT'])    ? $_SERVER['PHINX_DBPORT']      : '',
            'charset' => isset($_SERVER['PHINX_DBCHARSET']) ? $_SERVER['PHINX_DBCHARSET']   : '',
>>>>>>> b90c120a6682d1886c49803ad92ddd4da1bf69a0
        ],
    ],
];
