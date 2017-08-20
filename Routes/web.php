<?php

event('email.routing', app('router'));
$namespacePrefix = '\\'.'Tyondo\\Email\\Http\\Controllers'.'\\';
//-----Back-end ----------//

Route::get('/', function () {
    return view('partials.index');
});

Auth::routes();

Route::get('/home', $namespacePrefix.'HomeController@index');
//Contacts

Route::resource('mail', $namespacePrefix.'EmailController', [
    'names'=> [
        'index' => 'tyondo.mail.index',
        'create' => 'tyondo.mail.create',
        'store' => 'tyondo.mail.store',
        'update' => 'tyondo.mail.update',
        'destroy' => 'tyondo.mail.destroy',
        'show' => 'tyondo.mail.show',
        'edit' => 'tyondo.mail.edit',
    ]
]);