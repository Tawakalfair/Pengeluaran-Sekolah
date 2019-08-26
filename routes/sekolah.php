<?php

Route::group(['namespace' => 'Sekolah'], function() {
    Route::get('/', 'HomeController@index')->name('sekolah.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('sekolah.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('sekolah.logout');

    // Register
  //  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('sekolah.register');
    //Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('sekolah.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('sekolah.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('sekolah.password.reset');

});
