<?php

return [
    'cache-prefix' => 'model',

    'enabled' => env('MODEL_CACHE_ENABLED', true),

    'use-database-keying' => env('MODEL_CACHE_USE_DATABASE_KEYING', true),

    'store' => env('MODEL_CACHE_STORE', 'redis'),
];
