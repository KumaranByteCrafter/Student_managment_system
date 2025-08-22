<?php
declare(strict_types=1);

return [
    'app_name' => 'Student Management System',
    'db' => [
        'driver' => 'sqlite',
        'database' => dirname(__DIR__) . '/storage/database.sqlite',
    ],
    'security' => [
        'session_key' => 'sms_session',
    ],
];


