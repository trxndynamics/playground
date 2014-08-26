<?php

Route::group(array('prefix'=>'auth'), function(){
    Route::get('/login', 'AuthController@login');
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');
    Route::get('/register', 'AuthController@register');
    Route::post('/register', 'AuthController@register');
});

if(Sentry::check() === FALSE)   return Redirect::to('/login');

Route::group(array('prefix'=>'dashboard'), function(){
    Route::get('/', 'DashboardController@index');
});