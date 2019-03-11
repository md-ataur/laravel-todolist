<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '337690536880037',         // Your Facebook Client ID
        'client_secret' => 'f4c9f04c3344c7ef543222526e2cc506', // Your Facebook Client Secret
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ], 
    'twitter' => [
        'client_id' => 'ZcY9XQU3kKJ8pktpkOhSgjWNJ',         // Your twitter Client ID
        'client_secret' => 'cK0m6pUZJrveI9GPACwzMvGjpslvgHWXVjz88q0ND7FAyEzcMi', // Your twitter Client Secret
        'redirect' => 'http://127.0.0.1:8000/login/twitter/callback',
    ],
    'google' => [
        'client_id' => '857054384681-jvq9fl28pqahf1su2ll0c3bvtho429b7.apps.googleusercontent.com',   // Your google Client ID
        'client_secret' => 'MOG_QYsclYiZ11wXxa8qTrtn', // Your google Client Secret
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
];
