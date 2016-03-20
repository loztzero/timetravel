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
        'client_id' => '1077861668946877',
        'client_secret' => '744f00d3a955ad879e6fb5f75d31cc94',
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
