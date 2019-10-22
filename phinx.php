<?php
$adapter = getenv('d_adapter');
$host = getenv('d_host');
$name = getenv('d_name');
$user = getenv('d_user');
$pass = getenv('d_pass');
$port = getenv('d_port');
$charset = getenv('d_charset');
echo getenv('PHINX_DBFOLDER');
return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations/' . (isset($_SERVER['PHINX_DBFOLDER']) ? $_SERVER['PHINX_DBFOLDER'] : ''),
        'seeds'      => '%%PHINX_CONFIG_DIR%%/db/seeds/' . (isset($_SERVER['PHINX_DBFOLDER']) ? $_SERVER['PHINX_DBFOLDER'] : ''),
    ],
    'environments' => [
        'default_migration_table'   => 'phinxlog',
        'default_database'          => 'default',
        'default' => [
            'adapter' => isset($adapter) ? $adapter   : '',
            'host'    => isset($host)    ? $host      : '',
            'name'    => isset($name)    ? $name      : '',
            'user'    => isset($user)    ? $user      : '',
            'pass'    => isset($pass)    ? $pass      : '',
            'port'    => isset($port)    ? $port      : '',
            'charset' => isset($charset) ? $charset   : '',
        ],
    ],
];
