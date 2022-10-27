<?php

return [
    'name' => 'moha App',
    'defaultRoute' => 'home/index',
    'components' => [
        'db' => [
            'class' => 'app\components\MySqlConnection',
            'dsn' => 'mysql:host=localhost;dbname=blog',
            'username' => 'root',
            'password' => '',
        ],
    ]
];
