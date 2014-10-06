@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/panel-table-with-filters-per-column/panel-table-with-filters-per-column.css">
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/panel-table-with-filters-per-column/panel-table-with-filters-per-column.js"></script>
<script type="text/javascript" src="/resource/js/select-player.js"></script>
@stop

@section('content')
<div class="container">
    <h3>Select Squad</h3>
    <hr>
    <form method="post" action="/match/squad/select">
        <div class="row" id="playerList">
            @for($i=1; $i<=11; $i++)
            <div class="col-md-1" style="background-color:transparent; height:120px">
                <div class="row">
                    <div class="col-sm-12">
                        <img id="player-face-id-{{$i}}" src="@if ($i==1) {{ $user->goalkeeper_kit }} @else {{ $user->home_kit }}@endif" style="width:70%;" />
                    </div>
                    <div class="col-sm-12">
                        <span id="player-name-id-{{$i}}">Player #{{$i}}</span>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </form>
    <hr />
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Player List</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Select" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Nationality" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Age" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Position" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Total Stats" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Value" disabled></th>
                </tr>
                </thead>
                <tbody>
                @foreach($players as $player)
                <tr>
                    <td><a href="#" class="playerSelect" data-name="{{$player->misc['name']}}" data-image-ref="{{ $player->getImageFace() }}" data-name="{{ $player->misc['name'] }}" data-id="{{ $player->id }}" data-position="{{ $player->misc['position'] }}">Select</a></td>
                    <td><img src="{{ $player->getImageFace() }}" width="25" /> <a href="/player/stats/{{ $player->_id }}">{{ $player->misc['name'] }}</a></td>
                    <td><img src="{{ $player->getImageNation() }}" width="25" /> {{ $player->misc['nation'] }}</td>
                    <td>{{ $player->misc['age'] }}</td>
                    <td>{{ $player->misc['position'] }}</td>
                    <td><?php if(isset($player->attributes['total stats'])) echo $player->attributes['total stats']; ?></td>
                    <td>£{{ $player->getValue() }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop