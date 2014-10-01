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
                <?php
                    foreach($players as $index => $player){
                        $playerForm = $player->getForm();
                        $quote      = $player->getQuote('both');
                    ?>
                        <div class="col-md-4 col-sm-6 <?php if(($index % 3) > 0) echo 'hidden-xs'; ?>">
                            <div class="block-text rel zmin">
                                <a title="" href="#">{{ $player->misc['name'] }}</a>
                                <div class="mark">Current Form:
                                    <span class="rating-input">
                                        @for ($i=0; $i<5; $i++)
                                        <span data-value="{{ $i }}" class="glyphicon <?php echo ($i < $playerForm) ? 'glyphicon-star' : 'glyphicon-star-empty'; ?>"></span>
                                        @endfor
                                    </span>
                                </div>
                                <p>{{ $quote['long'] }}</p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <div class="person-text rel">
                                <img src="{{ $player->getImageFace() }}"/>
                                <a title="" href="#">{{ $player->misc['name'] }}</a>
                                <i>{{ $quote['short'] }}</i>
                            </div>
                        </div>

            <?php       if(($index % 3) == 2){  ?>
                    </div>
                    <div class="item">
            <?php       }
                    } ?>
                    </div>

                </div>
                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>
@stop