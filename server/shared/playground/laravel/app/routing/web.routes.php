<?php

Route::group(array('prefix'=>'auth'), function(){
    Route::get('/login', 'AuthController@login');
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');
    Route::get('/register', 'AuthController@register');
    Route::post('/register', 'AuthController@register');
});

if(Sentry::check()){
    $user = Sentry::getUser();

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
        Route::get('/squad/select', 'MatchController@selectSquad');
        Route::post('/squad/select', 'MatchController@selectSquad');
    });

    Route::group(array('prefix'=>'player'), function(){
        Route::get('/stats/{id}', 'PlayerController@stats');
        Route::get('/search', 'PlayerController@search');
    });

    Route::group(array('prefix'=>'squad'), function(){
        Route::get('/fitness', 'SquadController@fitness');
        Route::get('/current', 'SquadController@currentSquad');
    });

    Route::group(array('prefix'=>'league'), function(){
        Route::get('/table', 'LeagueController@table');
        Route::get('/table/{name}', 'LeagueController@table');
        Route::get('/calendar', 'LeagueController@calendar');
        Route::get('/calendar/{name}', 'LeagueController@calendar');
        Route::get('/results', 'LeagueController@results');
        Route::get('/results/{name}', 'LeagueController@results');
    });

    Route::get('/highlights', 'SocialController@highlights');

    Route::group(array('prefix'=>'user'), function(){
        Route::get('/profile', 'UserController@profile');
        Route::get('/settings', 'UserController@settings');
        Route::get('/settings/fixtures/generate', 'SettingsController@fixtureGenerate');
    });

    Route::group(array('prefix'=>'team'), function(){
        Route::get('/display/{name}', 'TeamController@displayTeam');
        Route::get('/stats/{name}', 'TeamController@stats');
        Route::get('/notifications', 'TeamController@notifications');
        Route::get('/finances', 'TeamController@finances');
    });

    Route::group(array('prefix'=>'fixture'), function(){
        Route::post('/create', 'MatchController@create');
        Route::get('/create', 'MatchController@create');
    });

    Route::group(array('prefix'=>'media'), function(){
        Route::get('/news', 'NotificationsController@news');
    });

    App::missing(function($exception){
        return Redirect::to('/start');
    });
}

//404
App::missing(function($exception)
{
    return Redirect::to('/auth/login');
//    return Response::view('display/404', array(), 404);
});