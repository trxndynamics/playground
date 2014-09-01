@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/skilled-progress-bars/skilled-progress-bars.css">
@stop

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Squad Fitness <small>Injuries and more</small></h1>
        </div>
    </div>
    <div class="row">
        <h4>Strikers</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                <span class="sr-only">86%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">86%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%">
                <span class="sr-only">88%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">88%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                <span class="sr-only">72%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">72%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%">
                <span class="sr-only">68%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">68%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                <span class="sr-only">56%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">56%</span>
        </div>
    </div>

    <div class="row">
        <h4>Midfielders</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                <span class="sr-only">86%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">86%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%">
                <span class="sr-only">88%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">88%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                <span class="sr-only">72%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">72%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%">
                <span class="sr-only">68%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">68%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                <span class="sr-only">56%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">56%</span>
        </div>
    </div>

    <div class="row">
        <h4>Defenders</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                <span class="sr-only">86%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">86%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%">
                <span class="sr-only">88%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">88%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                <span class="sr-only">72%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">72%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%">
                <span class="sr-only">68%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">68%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                <span class="sr-only">56%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">56%</span>
        </div>
    </div>

    <div class="row">
        <h4>Goalkeepers</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                <span class="sr-only">86%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">86%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%">
                <span class="sr-only">68%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">68%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                <span class="sr-only">56%</span>
            </div>
            <span class="progress-type">Player Name</span>
            <span class="progress-completed">56%</span>
        </div>
    </div>
</div>
@stop