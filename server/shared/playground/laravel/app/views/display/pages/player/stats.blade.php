@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/skilled-progress-bars/skilled-progress-bars.css">
@stop

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>FirstName SurName <small>Statistics and more</small></h1>
        </div>
    </div>
    <div class="row">
        <h4>Football Ability</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                <span class="sr-only">86%</span>
            </div>
            <span class="progress-type">Acceleration / Pace</span>
            <span class="progress-completed">86%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%">
                <span class="sr-only">88%</span>
            </div>
            <span class="progress-type">Ball Control / Dribbling</span>
            <span class="progress-completed">88%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                <span class="sr-only">72%</span>
            </div>
            <span class="progress-type">Passing</span>
            <span class="progress-completed">72%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%">
                <span class="sr-only">68%</span>
            </div>
            <span class="progress-type">Heading</span>
            <span class="progress-completed">68%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                <span class="sr-only">56%</span>
            </div>
            <span class="progress-type">Shooting</span>
            <span class="progress-completed">56%</span>
        </div>
    </div>

    <div class="row">
        <h4>Mentality</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="1" aria-valuemax="5" style="width: 50%;">
                <span class="sr-only">3</span>
            </div>
            <span class="progress-type">Aggression</span>
            <span class="progress-completed">3</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                <span class="sr-only">90%</span>
            </div>
            <span class="progress-type">Consistency</span>
            <span class="progress-completed">90%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                <span class="sr-only">50%</span>
            </div>
            <span class="progress-type">Communication</span>
            <span class="progress-completed">50%</span>
        </div>
    </div>

    <div class="row">
        <h4>Language Proficiency</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                <span class="sr-only">100</span>
            </div>
            <span class="progress-type">English</span>
            <span class="progress-completed">100</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                <span class="sr-only">50%</span>
            </div>
            <span class="progress-type">German</span>
            <span class="progress-completed">50%</span>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                <span class="sr-only">15%</span>
            </div>
            <span class="progress-type">French</span>
            <span class="progress-completed">15%</span>
        </div>
    </div>
</div>
@stop