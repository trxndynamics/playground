<?php

//Route::get('/', function(){
//    echo 'reached';
//});

Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');

//Route::get('/', function(){
//
////    $user = Sentry::findUserByLogin('martin0123456@hotmail.com');
////    $user->delete();
////
////    exit();
////    Sentry::register(['email'=>'martin0123456@hotmail.com','password'=>'marspass'], true);
////    $result = Sentry::authenticate(['email'=>'martin0123456@hotmail.com','password'=>'marspass'],true);
////
////    Sentry::loginAndRemember($user);
//
////    $user = Sentry::findUserByLogin('martin0123456@hotmail.com');
////    Sentry::loginAndRemember($user);
////    Sentry::authenticateAndRemember(['email'=>'martin0123456@hotmail.com','password'=>'marspass'],true);
//    var_dump(Sentry::check());
//    exit();
//
//    return View::make('hello');
//});