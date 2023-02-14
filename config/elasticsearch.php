<?php

return [
    'hosts' => [
        [
            'host' => env('ELASTICSEARCH_HOST', 'localhost'),
            'user' => env('ELASTICSEARCH_USER', ''),
            'pass' => env('ELASTICSEARCH_PASS', ''),
        ],
    ],
];