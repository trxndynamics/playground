<?php

Route::group(array('prefix'=>'auth'), function(){
    Route::get('/login', 'AuthController@login');
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');
    Route::get('/register', 'AuthController@register');
    Route::post('/register', 'AuthController@register');
});

if(Sentry::check()){
    Route::get('/start', 'DashboardController@start');
    Route::post('/start', 'DashboardController@start');

    Route::group(array('prefix'=>'dashboard'), function(){
        Route::get('/', 'DashboardController@index');
        Route::get('/tiles', 'DashboardController@tiles');
    });

    Route::group(array('notifications'), function(){
        Route::get('/notifications/players', 'NotificationsController@players');
    });

    Route::group(array('prefix'=>'match'), function(){
        Route::get('/timeline', 'MatchController@timeline');
    });
}

//404
App::missing(function($exception)
{
    return Redirect::to('/auth/login');
//    return Response::view('display/404', array(), 404);
});