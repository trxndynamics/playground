@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" href="/resource/bootsnipp/simple-datepicker-with-momentjs/simple-datepicker-with-momentjs.css" />
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/simple-datepicker-with-momentjs/simple-datepicker-with-momentjs.js" />
@stop

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Create a Fixture</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h2>Pick a Date</h2>
                <hr/>
                <div class="date-picker"  data-date="2014/09/02" data-keyboard="true">
                    <div class="date-container pull-left">
                        <h4 class="weekday">Monday</h4>
                        <h2 class="date">Februray 4th</h2>
                        <h4 class="year pull-right">2014</h4>
                    </div>
                    <span data-toggle="datepicker" data-type="subtract" class="fa fa-angle-left"></span>
                    <span data-toggle="datepicker" data-type="add" class="fa fa-angle-right"></span>
                    <div class="input-group input-datepicker">
                        <input type="text" class="form-control" data-format="YYYY/MM/DD" placeholder="YYYY/MM/DD">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                    <span data-toggle="calendar" class="fa fa-calendar"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <h2>Pick a Team</h2>
                <hr />
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Bundesliga</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Barclays PL</a></li>
                            <li><a href="#tab3default" data-toggle="tab">La Liga</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Other <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                    <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                </ul>
                            </li>
                        </ul>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">
                                @foreach($teams as $team)
                                <a href="#">{{$team}}</a><br />
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="tab2default">Default 2</div>
                            <div class="tab-pane fade" id="tab3default">Default 3</div>
                            <div class="tab-pane fade" id="tab4default">Default 4</div>
                            <div class="tab-pane fade" id="tab5default">Default 5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
</section>
@stop