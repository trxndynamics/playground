@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/panel-table-with-filters-per-column/panel-table-with-filters-per-column.css">
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/panel-table-with-filters-per-column/panel-table-with-filters-per-column.js"></script>
@stop

@section('content')
<div class="container">
    <h3>League Tables</h3>
    <hr>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $league->name }}</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Position" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Club Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Games Played" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Games Won" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Games Drawn" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Games Lost" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Goals For" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Goals Against" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Goals Difference" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Form" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Points" disabled></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($tableData as $teamName => $tableDataItem)
                <tr>
                    <td>{{ $i }}</td>
                    <td><a href="/team/stats/{{ $teamName }}">{{ $teamName }}</a></td>
                    <td>{{ $tableDataItem['played'] }}</td>
                    <td>{{ $tableDataItem['won'] }}</td>
                    <td>{{ $tableDataItem['draw'] }}</td>
                    <td>{{ $tableDataItem['lost'] }}</td>
                    <td>{{ $tableDataItem['for'] }}</td>
                    <td>{{ $tableDataItem['against'] }}</td>
                    <td>{{ $tableDataItem['for'] - $tableDataItem['against'] }}</td>
                    <td>{{ implode($tableDataItem['form']) }}</td>
                    <td>{{ $tableDataItem['points'] }}</td>
                </tr>
                <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop