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
        <div class="col-lg-12">Injured: {{{ implode(', ', $injuredList) }}}</div>
        <div class="col-lg-12">International Duty: {{{ implode(', ', $nationalDuty) }}}</div>
    </div>

<?php

$processList = [
    'Strikers'      => ['ST','CF'],
    'Midfielders'   => ['CAM','CM','CDM','LM','LF','LW','RM','RF','RW'],
    'Defenders'     => ['CB','LB','LWB','RWB','RB'],
    'Goalkeepers'   => ['GK']
];

foreach($processList as $listName=>$listItems){ ?>
    <div class="row">
        <h4>{{ $listName }}</h4>
<?php
    foreach($players as $player){
        if(!in_array($player->misc['position'], $listItems))  continue;
        $playerFitness = $player->getFitness();

        if($playerFitness > 90)         $classToUse = 'progress-bar-success';
        elseif($playerFitness > 70)     $classToUse = 'progress-bar-info';
        elseif($playerFitness > 50)     $classToUse = '';
        elseif($playerFitness > 30)     $classToUse = 'progress-bar-warning';
        else                            $classToUse = 'progress-bar-danger';
        ?>
        <div class="progress">
            <div class="progress-bar {{ $classToUse }}" role="progressbar" aria-valuenow="{{ $playerFitness }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $playerFitness }}%;">
                <span class="sr-only">{{ $playerFitness }}%</span>
            </div>
            <span class="progress-type"><img src="{{ $player->getImageFace() }}" />{{ $player->misc['name'] }}</span>
            <span class="progress-completed">{{ $playerFitness }}%</span>
        </div>
<?php } ?>
    </div>
<?php
}
?>
</div>
@stop