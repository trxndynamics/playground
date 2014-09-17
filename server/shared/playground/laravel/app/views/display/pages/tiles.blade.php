@extends('layouts/master')

<?php $user = Sentry::getUser(); ?>

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/metro-style-dynamic-tiles/metro-style-dynamic-tiles.css">
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/metro-style-dynamic-tiles/metro-style-dynamic-tiles.js"></script>
@stop

@section('content')
<div class="container dynamicTile">
    <div class="row">
        <div class="col-sm-2 col-xs-4">
            <div id="tile1" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active" data-url="/match/squad/select">
                            <h3 class="tilecaption"><i class="fa fa-soccer-ball-o fa-4x"></i>Matchday</h3>
                        </div>
                        @if($nextMatch !== null)
                        <div class="item" data-url="/match/timeline">
                            <h3 class="tilecaption">{{$nextMatch->home}} v {{$nextMatch->away}}</h3>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-xs-4">
            <div id="tile2" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active" data-url="/league/calendar">
                            <h3 class="tilecaption"><i class="fa fa-calendar fa-4x"></i> Fixtures</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-xs-4">
            <div id="tile9" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active" data-url="/squad/current">
                            <h3 class="tilecaption"><i class="fa fa-male fa-4x"></i> Squad</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-2 col-xs-4">
            <div id="tile4" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active" data-url="/player/search">
                            <h3 class="tilecaption"><i class="fa fa-search fa-4x"></i> Scouting</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-xs-4">
            <div id="tile5" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <h3 class="tilecaption"><i class="fa fa-newspaper-o fa-4x"></i> News</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-xs-4">
            <div id="tile6" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <h3 class="tilecaption"><i class="fa fa-facebook-square fa-4x"></i> Facebook</h3>
                        </div>
                        <div class="item">
                            <h3 class="tilecaption"><i class="fa fa-google-plus fa-4x"></i> Google+</h3>
                        </div>
                        <div class="item">
                            <h3 class="tilecaption"><i class="fa fa-twitter fa-4x"></i> Twitter</h3>
                        </div>
                        <div class="item">
                            <h3 class="tilecaption"><i class="fa fa-digg fa-4x"></i> Digg</h3>
                        </div>
                        <div class="item">
                            <h3 class="tilecaption"><i class="fa fa-reddit fa-4x"></i> Reddit</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-xs-4">
            <div id="tile7" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active" data-url="/highlights">
                            <h3 class="tilecaption"><i class="fa fa-youtube-play fa-4x"></i> Highlights</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-xs-4">
            <div id="tile8" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item">
                            <h3 class="tilecaption"><i class="fa fa-line-chart fa-4x"></i> Finances</h3>
                        </div>
                        <div class="item" data-url="/player/stats">
                            <h3 class="tilecaption"><i class="fa fa-pie-chart fa-4x"></i> Statistics</h3>
                        </div>
                        <div class="item active" data-url="/league/table">
                            <h3 class="tilecaption"><i class="fa fa-area-chart fa-4x"></i> League Position</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-xs-4">
            <div id="tile9" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <h3 class="tilecaption"><i class="fa fa-trophy fa-4x"></i> Achievements</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-8">
            <div id="tile1" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active" data-url="/team/notifications">
                            <h3 class="tilecaption"><i class="fa fa-comments fa-4x"></i> Player Notifications</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-xs-4">
            <div id="tile3" class="tile">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active" data-url="/squad/fitness">
                            <h3 class="tilecaption"><i class="fa fa-medkit fa-4x"></i> Injuries</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop