<?php

return [

    /*
     * Email App Name
     * */
    'app_name' => 'Morpheus',

    /*
    |--------------------------------------------------------------------------
    | Static Email Settings
    |--------------------------------------------------------------------------
    |
    */

    'email_host' => 'imap.gmail.com', //http://vteams.com/blog/parsing-and-retrieving-emails-from-gmail-inbox-using-php5-imap/
    'email_user' => '',
    'email_password' => '',


    /*
     |--------------------------------------------------------------------------
     | Musoni Website Views
     |--------------------------------------------------------------------------
     | The website has pre-defined view, their customization can be handled here
     |
     |
     */
    'namespace'=>'\\Tyondo\\Email\\Models\\',
    'views' => [
        'layouts' => [
            'master'        => 'TyondoEmail::layouts.app',
            'auth'        => 'TyondoEmail::layouts.auth',
        ],
        'pages' => [
            'mail' => [
                'index'     => 'TyondoEmail::pages.inbox.emails-list',
                'compose'    => 'TyondoEmail::pages.compose.compose',
                'show'      => 'TyondoEmail::pages.inbox.email',
            ],
            'partials' => [
                'search' => 'TyondoEmail::partials.email-search'
            ],
            'authentication' => [
                'login'     => 'TyondoEmail::auth.login',
                'reset'     => 'TyondoEmail::auth.passwords.reset',
                'forgot'     => 'TyondoEmail::auth.passwords.email',
                'register'     => 'TyondoEmail::auth.register',
            ],
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Musoni Package Navigation Menu
    |--------------------------------------------------------------------------
    |
    |
    */
    'navigation' => [

        [
            'group' => 'FAQ',
            'class' => 'fa fa-cubes fa-lg',
            'links' => [
                [
                    'title' => 'Add Faq',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'musoni.faq.create'
                ],
                [
                    'title' => 'List Faq',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'musoni.faq.index'
                ],

            ]
        ],
    ],
];