@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/panel-table-with-filters-per-column/panel-table-with-filters-per-column.css">
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/panel-table-with-filters-per-column/panel-table-with-filters-per-column.js"></script>
@stop

@section('content')
<div class="container">
    <h3>Team Stats</h3>
    <hr>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $team->name }}</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table team-stats">
                <thead>
                <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Position" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Player Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Appearances" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Goals" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Assists" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Goals Per Game" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Assists Per Game" disabled></th>
                    <th><input type="text" class="form-control" placeholder="MOTM" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Form" disabled></th>
                </tr>
                </thead>
                <tbody>
                @foreach($players as $id=>$player)
                <?php
                    $appearances    = $player->getAppearances();
                    $goalsPerGame   = ($appearances > 0) ? round($player->getGoals() / $appearances,2) : 0;
                    $assistsPerGame = ($appearances > 0) ? round($player->getAssists() / $appearances,2) : 0;
                ?>
                <tr>
                    <td>{{ $player->misc['position'] }}</td>
                    <td><img src="{{ $player->getImageFace() }}" /><a href="/player/stats/{{ $player->id }}">{{ $player->getName() }}</a></td>
                    <td>{{ $appearances }}</td>
                    <td>{{ $player->getGoals() }}</td>
                    <td>{{ $player->getAssists() }}</td>
                    <td>{{ $goalsPerGame }}</td>
                    <td>{{ $assistsPerGame }}</td>
                    <td>{{ $player->getMOTMs() }}</td>
                    <td>{{ $player->getForm(true) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop