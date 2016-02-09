<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => '',
        'secret' => '',
    ],

    'facebook' => [
        'client_id' => '429718447219223',
        'client_secret' => 'd6c8e818a75dafc9c6c699c7a66aec54',
        'redirect' => 'http://tester.holidayku.com/callback',
    ],

    // 'twitter' => [
    //     'client_id' => 'your-github-app-id',
    //     'client_secret' => 'your-github-app-secret',
    //     'redirect' => 'http://your-callback-url',
    // ],

    // 'google' => [
    //     'client_id' => 'your-github-app-id',
    //     'client_secret' => 'your-github-app-secret',
    //     'redirect' => 'http://your-callback-url',
    // ],


];
