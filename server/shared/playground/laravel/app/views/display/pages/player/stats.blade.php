@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/skilled-progress-bars/skilled-progress-bars.css">
@stop

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1><img src="{{ $player->getImageFace() }}" width="100" /> <img src="{{ $player->getImageNation() }}" width="100" /> {{ $player->misc['name'] }} <small>Statistics and more</small></h1>
        </div>
    </div>
    <div class="row">
        <h4>Main Stats</h4>
        <div class="col-lg-12">Position: {{ $player->getPosition() }}</div>
        <div class="col-lg-12">Appearances: {{ $player->getAppearances() }}</div>
        <div class="col-lg-12">Goals: {{ $player->getGoals() }}</div>
        <div class="col-lg-12">Assists: {{ $player->getAssists() }}</div>
        <div class="col-lg-12">Man Of The Match: {{ $player->getMOTMs() }}</div>
        <br /><br />
        <h4>Attributes</h4>
        <?php
        foreach($player->attributes as $fieldName => $fieldValue){
            if($fieldName === 'total stats') continue;

            if($fieldValue > 90)        $classToUse = 'progress-bar-success';
            elseif($fieldValue > 70)    $classToUse = 'progress-bar-info';
            elseif($fieldValue > 50)    $classToUse = '';
            elseif($fieldValue > 30)    $classToUse = 'progress-bar-warning';
            else                        $classToUse = 'progress-bar-danger';
        ?>
        <div class="progress">
            <div class="progress-bar {{ $classToUse }}" role="progressbar" aria-valuenow="{{ $fieldValue }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $fieldValue }}%;">
                <span class="sr-only">{{ $fieldValue }}%</span>
            </div>
            <span class="progress-type">{{ ucwords($fieldName) }}</span>
            <span class="progress-completed">{{ $fieldValue }}%</span>
        </div>
        <?php
        } ?>
    </div>
</div>
@stop