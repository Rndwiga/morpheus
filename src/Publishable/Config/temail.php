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

    'email_host' => 'imap.gmail.com',
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
        ],
        'pages' => [
            'mail' => [
                'index'     => 'TyondoEmail::partials.index',
                'create'    => 'TyondoEmail::partials.create',
                'show'      => 'TyondoEmail::partials.show',
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