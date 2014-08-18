<?php

//Route::get('/', function(){
//    echo 'reached';
//});

Route::get('/', function(){

    Sentry::register(['email'=>'martin0123456@hotmail.com','password'=>'marspass']);
//    $result = Sentry::authenticate(['email'=>'martin0123456@hotmail.com','password'=>'marspass']);
//    var_dump($result);
    exit();

    return View::make('hello');
});