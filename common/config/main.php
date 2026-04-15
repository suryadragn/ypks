<?php

return [
    'name' => $_ENV['APP_NAME'] ?? 'Yapendikra',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => $_ENV['DB_DSN'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => 'utf8',
            'enableSchemaCache' => YII_ENV === 'prod',
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
    ],
];
