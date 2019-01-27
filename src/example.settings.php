<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to true in production
        'addContentLengthHeader' => false,
        
        // database
      	'database' =>[
                'db_type'   => '',
                'db_name'   => '',
                'server'    => '',
                'username'  => '',
                'password'  => '',
                'charset'   => ''
        ],

        // Monolog settings
        'logger' => [
            'name' => 'Curauma',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];