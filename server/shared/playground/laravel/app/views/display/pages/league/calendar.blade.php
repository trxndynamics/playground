@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/event-list/event-list.css">
@stop

@section('content')
<div class="container">
    <h3>League Calendar: <a href="/fixture/create">Create Fixture</a> <a href="/league/results">View Results</a> <a href="/league/calendar">View Fixtures</a></h3>
    <hr>
    <div class="row">
        <div class=" col-xs-12 col-sm-offset-2 col-sm-8 ">
            <ul class="event-list">
                @foreach($matches as $match)
                <?php
                    $carbonDate     = \Carbon\Carbon::parse($match->date['date']);

                    foreach($match->teams as $team){
                        if(!isset($imageFolderRef))     $imageFolderRef = str_replace(' ','_',mb_strtolower($team));
                        else if($team !== $filterTeam)  $imageFolderRef = str_replace(' ','_',mb_strtolower($team));
                    }

                    $matchDesc = ($results == true)
                        ? $match->home.' '.$match->getGoals('home').' vs '.$match->getGoals('away').' '.$match->away
                        : $match->home.' vs '.$match->away
                    ;
                ?>
                <li>
                    <time datetime="{{ $carbonDate->format('Y-m-d') }}">
                        <span class="day">{{ $carbonDate->format('d') }}</span>
                        <span class="month">{{ $carbonDate->format('M') }}</span>
                        <span class="year">{{ $carbonDate->format('Y') }}</span>
                        <span class="time">{{ $carbonDate->format('ia') }}</span>
                    </time>
                    <img alt="Club Crest" src="/resource/images/crests/13/{{ $imageFolderRef }}/crest.png" />
                    <div class="info">
                        <h2 class="title">{{ $match->getFixtureType() }}</h2>
                        <p class="desc">{{  $matchDesc }}</p>
                        <ul>
                        @if($results == true)
                            <li style="width:33%;"><span class="fa fa-male"></span>  Attendance {{ number_format($match->getAttendance()) }}</li>
                            <li style="width:34%;"><span class="fa fa-table"></span>  Matchday {{ $match->matchDay }}</li>
                            <li style="width:33%;"><span class="fa fa-money"></span> £{{ number_format($match->getMatchEarnings()) }}</li>
                        @else
                            <li style="width:100%;"><span class="fa fa-table"></span>  Matchday {{ $match->matchDay }}</li>
                        @endif
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
                @endforeach
            </ul>
        </div>
    </div>
</div>

@stop