@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" href="/resource/bootsnipp/simple-datepicker-with-momentjs/simple-datepicker-with-momentjs.css" />
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/simple-datepicker-with-momentjs/simple-datepicker-with-momentjs.js"></script>
<script type="text/javascript" src="/resource/js/create-fixture.js"></script>
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
                        <input id="selectedDate" type="text" class="form-control" data-format="YYYY/MM/DD" placeholder="YYYY/MM/DD">
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
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Pick a League <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($leagues as $id=>$league)
                                    <li><a href="#tab{{$id+1}}default" data-toggle="tab">{{ $league->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">

                            @foreach($leagues as $id => $league)
                            <div class="tab-pane fade in active" id="tab{{$id+1}}default">
                                @foreach($league->teams as $teamName)
                                <a href="#" class="teamSelect">{{$teamName}}</a><br />
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button id="submit">Submit</button>
            </div>
        </div>
    </div>

    <form id="finalForm" action="/fixture/create" method="post">
        <input type="hidden" name="selectedDate" id="finalDate" value="" />
        <input type="hidden" name="club" id="finalClub" value="" />
    </form>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
</section>
@stop