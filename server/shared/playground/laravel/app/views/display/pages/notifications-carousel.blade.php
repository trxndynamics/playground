@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/carousel-reviews-with-rating/carousel-reviews-with-rating.css">
@stop

@section('content')

<div class="container">
    <div class="row">
        <h2>Player Notifications</h2>
    </div>
</div>
<div class="carousel-reviews broun-block">
    <div class="container">
        <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($notifications as $notification)
                        <div class="col-md-4 col-sm-6">
                            <div class="block-text rel zmin">
                                <a title="" href="#">{{ $notification['header'] }}</a>
                                <div class="mark"></div>
                                <p>{{ $notification['text'] }}</p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <div class="person-text rel">
                                <img src="/resource/images/player/faces/{{$notification['id']}}.png"/>
                                <a title="" href="#">Anna</a>
                                <i>from Glasgow, Scotland</i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop