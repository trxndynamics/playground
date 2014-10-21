@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/news-carousel/news-carousel.css">
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/news-carousel/news-carousel.js"></script>
@stop

@section('content')
<div class="container">
    <h3>Media Reports</h3>
    <hr>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <?php $teamThreeStatus = $teamThree->getStatus(); ?>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="http://placehold.it/760x400/cccccc/ffffff">
                <div class="carousel-caption">
                    <h4><a href="#">Rolando set to sign for {{ $user->club }}</a></h4>
                    <p>Rolando is looking to sign a contract with {{ $user->club }} after having a successful trial.  Provided both parties can agree on wages and the right financial agreement then Rolando should be set to transfer to {{ $user->club }} within the next few days.</p>
                </div>
            </div><!-- End Item -->

            <div class="item">
                <img src="http://placehold.it/760x400/999999/cccccc">
                <div class="carousel-caption">
                    <h4><a href="#">{{ $teamTwo->name }} scouting {{ $player->misc['name'] }}</a></h4>
                    <p>Reports suggest that {{ $teamTwo->name }} are currently on the lookout for a {{ $player->misc['position'] }} and have set their sights on {{ $player->misc['name'] }} <a class="label label-primary" href="/player/stats/{{ $player->_id }}" target="_blank">Player Stats</a></p>
                </div>
            </div><!-- End Item -->

            <div class="item">
                <img src="http://placehold.it/760x400/dddddd/333333">
                <div class="carousel-caption">
                    <h4><a href="#">{{ $teamThree->name }} {{ $teamThreeStatus }}</a></h4>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. </p>
                </div>
            </div><!-- End Item -->

            <div class="item">
                <img src="http://placehold.it/760x400/999999/cccccc">
                <div class="carousel-caption">
                    <h4><a href="#">{{ $player->misc['name'] }} flattered by interest from {{ $teamTwo->name }}</a></h4>
                    <p>Media reports suggest that {{ $player->misc['name'] }} is set to sign for {{ $teamTwo->name }} amidst reports he may be offered to clubs elsewhere. A statement released from {{ $player->misc['name'] }} suggests that he is open to the right offer and would be happy to leave {{ $player->misc['club'] }} <a class="label label-primary" href="/player/stats/{{ $player->_id }}" target="_blank">Player Stats</a></p>
                </div>
            </div><!-- End Item -->


        </div><!-- End Carousel Inner -->


        <ul class="list-group col-sm-4">
            <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h4>Rolando set to sign for {{ $user->club }}</h4></li>
            <li data-target="#myCarousel" data-slide-to="1" class="list-group-item"><h4>{{ $teamTwo->name }} scouting {{ $player->misc['name'] }}</h4></li>
            <li data-target="#myCarousel" data-slide-to="2" class="list-group-item"><h4>{{ $teamThree->name }} {{ $teamThreeStatus }}</h4></li>
            <li data-target="#myCarousel" data-slide-to="3" class="list-group-item"><h4>{{ $player->misc['name'] }} flattered by interest from {{ $teamTwo->name }}</h4></li>
        </ul>

        <!-- Controls -->
        <div class="carousel-controls">
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

    </div><!-- End Carousel -->
</div>
@stop