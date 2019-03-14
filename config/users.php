<?php

return [
    'Users' => [
        //configure Auth component
        'auth' => true,
        'Token' => ['expiration' => 86400],
        'Email' => [
            //determines if the user should include email
            'required' => true,
            //determines if registration workflow includes email validation
            'validate' => true,
        ],
        'Registration' => [
            //determines if the register is enabled
            'active' => true,
            //ensure user is active (confirmed email) to reset his password
            'ensureActive' => true
        ],
        'Tos' => [
            //determines if the user should include tos accepted
            'required' => true,
        ],
        'RememberMe' => [
            //configure Remember Me component
            'active' => true,
        ],
    ],
    //default configuration used to auto-load the Auth Component, override to change the way Auth works
    'Auth' => [
        'authenticate' => [
            'all' => [
                'finder' => 'auth'
            ],
            'CakeDC/Auth.ApiKey',
            'CakeDC/Auth.RememberMe',
        ],
        'allowedActions' => ['register'],
        'authorize' => [
            'CakeDC/Auth.Superuser',
            'CakeDC/Auth.SimpleRbac',
        ],
    ],
];