@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/event-list/even-list.css">
@stop

@section('content')
<div class="container">
    <h3>League Calendar</h3>
    <hr>
    <div class="row">
        <div class=" col-xs-12 col-sm-offset-2 col-sm-8 ">
            <ul class="event-list">
                <li>
                    <time datetime="2014-07-20">
                        <span class="day">4</span>
                        <span class="month">Jul</span>
                        <span class="year">2014</span>
                        <span class="time">3pm</span>
                    </time>
                    <img alt="Independence Day" src="/resource/images/crests/13/aarhus_gf/crest.png" />
                    <div class="info">
                        <h2 class="title">Friendly</h2>
                        <p class="desc">Club Name vs AGF Aarhus</p>
                    </div>
                    <div class="social">
                        <ul>
                            <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                            <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <time datetime="2014-07-20 0000">
                        <span class="day">1</span>
                        <span class="month">Sept</span>
                        <span class="year">2014</span>
                        <span class="time">All Day</span>
                    </time>
                    <div class="info">
                        <h2 class="title">Transfer Deadline Day</h2>
                        <p class="desc">Last chance to sign players</p>
                        <ul>
                            <li style="width:50%;"><a href="/player/search"><span class="fa fa-globe"></span> Go To Player Search</a></li>
                        </ul>
                    </div>
                    <div class="social">
                        <ul>
                            <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                            <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <time datetime="2014-07-20">
                        <span class="day">4</span>
                        <span class="month">Jul</span>
                        <span class="year">2014</span>
                        <span class="time">3pm</span>
                    </time>
                    <img alt="Independence Day" src="/resource/images/crests/13/randers_fc/crest.png" />
                    <div class="info">
                        <h2 class="title">Friendly</h2>
                        <p class="desc">Club Name vs Randers FC</p>
                    </div>
                    <div class="social">
                        <ul>
                            <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                            <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <time datetime="2014-07-20">
                        <span class="day">5</span>
                        <span class="month">Sept</span>
                        <span class="year">2014</span>
                        <span class="time">3pm</span>
                    </time>
                    <img alt="Independence Day" src="/resource/images/crests/13/blackpool/crest.png" />
                    <div class="info">
                        <h2 class="title">Friendly</h2>
                        <p class="desc">Club Name vs Blackpool</p>
                    </div>
                    <div class="social">
                        <ul>
                            <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                            <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@stop