@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/panel-table-with-filters-per-column/panel-table-with-filters-per-column.css">
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/panel-table-with-filters-per-column/panel-table-with-filters-per-column.js"></script>
@stop

@section('content')
<div class="container">
    <h3>Scouting</h3>
    <hr>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Player Search</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Nationality" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Club" disabled></th>
                    <th><input type="text" class="form-control" placeholder="League" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Age" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Value" disabled></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Xherdan Shaqiri</td>
                    <td>Switzerland</td>
                    <td>Bayern Munich</td>
                    <td>Bundesliga</td>
                    <td>22</td>
                    <td>£15m</td>
                </tr>
                <tr>
                    <td>Granit Xhaka</td>
                    <td>Switzerland</td>
                    <td>Borussia Mochengladbach</td>
                    <td>Bundesliga</td>
                    <td>21</td>
                    <td>£4m</td>
                </tr>
                <tr>
                    <td>Rafael Van der Vaart</td>
                    <td>Netherlands</td>
                    <td>Hamburger SV</td>
                    <td>Bundesliga</td>
                    <td>31</td>
                    <td>£3m</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop