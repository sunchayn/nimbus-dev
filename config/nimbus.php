<?php

return [
    'prefix' => 'demo',
    'default_application' => 'main',
    'allowed_envs' => ['local', 'staging', 'production'],

    'applications' => [
        'main' => [
            'name' => 'Demo API',
            'routes' => [
                'prefix' => '_demo',
                'versioned' => true,
                'api_base_url' => env('NIMBUS_RELAY_ENDPOINT'),
            ],
            'auth' => [
                'guard' => 'web',
                'special' => [
                    'injector' => \Sunchayn\Nimbus\Modules\Relay\Authorization\Injectors\RememberMeCookieInjector::class,
                ],
            ],
            'headers' => [
                'x-request-id' => \Sunchayn\Nimbus\Modules\Config\GlobalHeaderGeneratorTypeEnum::Uuid,
                'x-session-id' => \Sunchayn\Nimbus\Modules\Config\GlobalHeaderGeneratorTypeEnum::Uuid,
            ],
        ],
        'internal' => [
            'name' => 'Internal API',
            'routes' => [
                'prefix' => 'api',
                'versioned' => true,
                'api_base_url' => env('NIMBUS_RELAY_ENDPOINT'),
            ],
            'auth' => [
                'guard' => 'web',
                'special' => [
                    'injector' => \Sunchayn\Nimbus\Modules\Relay\Authorization\Injectors\RememberMeCookieInjector::class,
                ],
            ],
            'headers' => [
                'x-admin-token' => 'secret-admin-token',
            ],
        ],
    ],
];
