@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/responsive-youtube-player/responsive-youtube-player.css">
@stop

@section('content')
<!-- Reference: http://avexdesigns.com/responsive-youtube-embed/ -->

<div class="container">
    <div class="row">
        <h3>Club Highlights</h3>
        <p>The latest highlights, direct from your club</p>

        <hr>
    </div><!--.row -->
</div><!--./container -->

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="vid">
                <iframe width="560" height="315" src="//www.youtube.com/embed/videoseries?list=PLaz9sigNulyl3oKliadvtFdTRmNvpF_CL" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

    </div>

</div><!--./container -->

@stop