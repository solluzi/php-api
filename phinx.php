<?php
return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations/' . (isset($_SERVER['PHINX_DBFOLDER']) ? $_SERVER['PHINX_DBFOLDER'] : ''),
        'seeds'      => '%%PHINX_CONFIG_DIR%%/db/seeds/' . (isset($_SERVER['PHINX_DBFOLDER']) ? $_SERVER['PHINX_DBFOLDER'] : ''),
    ],
    'environments' => [
        'default_migration_table'   => 'phinxlog',
        'default_database'          => 'default',
        'default' => [
            'adapter' => isset($_SERVER['PHINX_DBADAPTER']) ? $_SERVER['PHINX_DBADAPTER']   : '',
            'host'    => isset($_SERVER['PHINX_DBHOST'])    ? $_SERVER['PHINX_DBHOST']      : '',
            'name'    => isset($_SERVER['PHINX_DBNAME'])    ? $_SERVER['PHINX_DBNAME']      : '',
            'user'    => isset($_SERVER['PHINX_DBUSER'])    ? $_SERVER['PHINX_DBUSER']      : '',
            'pass'    => isset($_SERVER['PHINX_DBPASS'])    ? $_SERVER['PHINX_DBPASS']      : '',
            'port'    => isset($_SERVER['PHINX_DBPORT'])    ? $_SERVER['PHINX_DBPORT']      : '',
            'charset' => isset($_SERVER['PHINX_DBCHARSET']) ? $_SERVER['PHINX_DBCHARSET']   : '',
        ],
    ],
];
