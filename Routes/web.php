<?php

event('email.routing', app('router'));
$namespacePrefix = '\\'.'Tyondo\\Email\\Http\\Controllers'.'\\';
//-----Back-end ----------//

Route::get('/', function () {
    return view('partials.index');
});

Auth::routes();

Route::get('/home', $namespacePrefix.'HomeController@index');
Route::get('/mail/ajax', $namespacePrefix.'EmailController@indexAjax');

Route::get('/mail/test', $namespacePrefix.'EmailController@testFn');
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

Route::group(['middleware' => 'web'], function () {
    //event('email.routing', app('router'));
    $namespacePrefix = '\\'.'Tyondo\\Email\\Http\\Controllers'.'\\';
    Route::post('mail/auth/login', $namespacePrefix.'Auth\LoginController@login')->name(config('tyondo_sms.routes.user.login.post'));
    Route::get('mail/auth/login', $namespacePrefix.'Auth\LoginController@showLoginForm')->name(config('tyondo_sms.routes.user.login.form'));
    Route::post('mail/auth/logout', $namespacePrefix.'Auth\LoginController@logout')->name(config('tyondo_sms.routes.user.logout'));
    Route::post('mail/auth/forgot/password', $namespacePrefix.'Auth\ForgotPasswordController@sendResetLinkEmail')->name(config('tyondo_sms.routes.user.forgot.post'));
    Route::get('mail/auth/forgot/password', $namespacePrefix.'Auth\ForgotPasswordController@showLinkRequestForm')->name(config('tyondo_sms.routes.user.forgot.form'));
    Route::post('mail/auth/reset/password', $namespacePrefix.'Auth\ResetPasswordController@reset')->name(config('tyondo_sms.routes.user.reset.post'));
    Route::get('mail/auth/reset/password', $namespacePrefix.'Auth\ResetPasswordController@showResetForm')->name(config('tyondo_sms.routes.user.reset.form'));
    Route::post('mail/auth/register/password', $namespacePrefix.'Auth\RegisterController@register')->name(config('tyondo_sms.routes.user.register.post'));
    Route::get('mail/auth/register/password', $namespacePrefix.'Auth\RegisterController@showRegistrationForm')->name(config('tyondo_sms.routes.user.register.form'));
//Route::resource('', '')->name('');

});