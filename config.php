<?php

return [
    'database' => [
        'driver' => 'mysql',
        'url' => '',
        'host' => '127.0.0.1',
        'port' => '3306',
        'name' => 'turcalendardb',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'options' => [
            // Явно указываем PDO выбрасывать исключения при ошибках
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ]
    ]

];
