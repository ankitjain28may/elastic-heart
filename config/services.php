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

    'facebook' => [
        'client_id' =>  '1041334742606679',
        'client_secret' => '9fd29e98aaecf5438781d0559007f654',
        'redirect' => 'http://plexus.dev/social/callback/facebook',
    ],


     'google' => [
        'client_id' =>  '911724778979-bequ5s71u7r5m45gss5aihs3qq85n5j0.apps.googleusercontent.com',
        'client_secret' => 'X4ATsWaV_66pG4wn0IB2p8I6',
        'redirect' => 'http://plexus.dev/social/callback/google',
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
