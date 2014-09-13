@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/event-list/event-list.css">
@stop

@section('content')
<div class="container">
    <h3>League Calendar: <a href="/fixture/create">Create Fixture</a></h3>
    <hr>
    <div class="row">
        <div class=" col-xs-12 col-sm-offset-2 col-sm-8 ">
            <ul class="event-list">
                @foreach($matches as $match)
                <?php
                    $carbonDate     = \Carbon\Carbon::parse($match->date['date']);
                    $imageFolderRef = ($match->home === $user->club) ? $match->away : $match->home;
                    $imageFolderRef = str_replace(' ','_',mb_strtolower($imageFolderRef));
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
                        <h2 class="title">Friendly</h2>
                        <p class="desc">{{ $match->home }} vs {{ $match->away }}</p>
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