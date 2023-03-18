<?php

return [

    /* Create a copy/backup of current env.example at start */

    'create_bakup' => false,
    'backup_file_name' => 'env.example.bak',

    /* All keys in this array will not be cleared upon copying to .env.example */

    'keep' => [
        'APP_NAME',
        'DB_CONNECTION',
        'DB_PORT',
        'MAIL_MAILER',
        'MAIL_HOST',
        'MAIL_PORT',
        'MAIL_ENCRYPTION',
        'MAIL_FROM_ADDRESS',
        'MAIL_FROM_NAME',
        'LOG_CHANNEL',
        'LOG_DEPRECATIONS_CHANNEL',
        'LOG_LEVEL',
        'BROADCAST_DRIVER',
        'CACHE_DRIVER',
        'FILESYSTEM_DISK',
        'QUEUE_CONNECTION',
        'SESSION_DRIVER',
        'SESSION_LIFETIME',
        'AWS_DEFAULT_REGION',
        'AWS_USE_PATH_STYLE_ENDPOINT',
        'AWS_URL',
        'AWS_ENDPOINT',
        'MEMCACHED_HOST',
        'REDIS_HOST',
        'REDIS_PORT',
    ],

    /* All keys in this array will not be copyied to .env.example */

    'ignore' => [],

];
