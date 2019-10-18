<?php
$settings = require __DIR__ . '/settings.php';
$db = $settings['db'];

return [
    'paths' => [
        'migrations' => __DIR__ . '/migrations'
    ],
    'migration_base_class' => '\App\Migration\Migration',
    'environments' => [
        'default_migration_table' => 'phinxmigrationlog',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => 'mysql',
            'host' => $db['host'],
            'name' => $db['database'],
            'user' => $db['username'],
            'pass' => $db['password'],
            'port' => $db['port']
        ]
    ]
];