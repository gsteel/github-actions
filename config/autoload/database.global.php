<?php
declare(strict_types=1);

return [
    'database' => [
        'host' => '127.0.0.1',
        'database' => 'test',
        'username' => 'root',
        'password' => 'password',
        'port' => getenv('MYSQL_PORT') ?: 3306,
    ],
    'redis' => [
        'host' => '127.0.0.1',
        'port' => getenv('REDIS_PORT') ?: 6379,
    ],
];
