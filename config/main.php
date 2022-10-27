<?php

return [
    'name' => 'moha App',
    'components' => [
        'db' => [
            'class' => 'app\components\MySqlConnection',
            'dsn' => 'mysql:host=localhost;dbname=blog',
            'username' => 'root',
            'password' => '',
        ],
    ]
];
