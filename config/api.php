<?php

return [
    'client_config' => [
        'timeout'     => '20.0',
        'cookies'     => true,
        'verify'      => false,
        'headers'     => [
            'Content-Type' => 'application/json',
        ],
        'http_errors' => false,
    ],

    'weather' => [
        'api_url' => env('WEATHER_API_URL'),
        'api_key' => env('WEATHER_API_KEY'),
    ],
];
