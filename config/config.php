<?php

// retorna as conexões
return [
    // Primeiro banco
    'api' => [
        'user' => getenv('d_user'),
        'pass' => getenv('d_pass'),
        'name' => getenv('d_name'),
        'host' => getenv('d_host'),
        'type' => getenv('d_adapter'),
        'port' => getenv('d_port')
    ],
    'crm'     => [],
    'finance' => [],
];
