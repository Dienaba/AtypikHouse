<?php

return [



    'defaults' => [
    'guard' => 'web',
    'passwords' => 'users', // for aesy, because dont need create table for admins, vendors and users. Only one table
    ],

    //   'defaults' => [
    //   'guard' => 'api',
    //   'passwords' => 'users', // this metode dont work with Modules system in the Laravel. I dont know why... F2I
  // ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],



    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class, // 
        ],

        // 'users' => [
        //     'driver' => 'database', // we use eloquent
        //     'table' => 'users',
        // ],
    ],



    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,  // its maximum for eloquent
        ],
    ],


    'password_timeout' => 10800,
];
