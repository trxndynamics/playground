@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/skilled-progress-bars/skilled-progress-bars.css">
@stop

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12 player-stats-head">
            <img id="player-face" src="{{ $player->getImageFace() }}" />
            <img id="player-nation" src="{{ $player->getImageNation() }}"  />
            <h1>{{ $player->misc['name'] }}<br /> <small>Statistics and more</small></h1>
        </div>
    </div>
    <div class="row">
        <h4>Main Stats</h4>
        <div class="col-lg-12">
            <div class="row">
            <?php
            $appearances    = $player->getAppearances();
            $goalsPerGame   = ($appearances > 0) ? round($player->getGoals() / $appearances, 2) : 0;
            $assistsPerGame = ($appearances > 0) ? round($player->getAssists() / $appearances, 2) : 0;
            ?>
                <div class="col-lg-4">
                    <div class="col-lg-12">Position: {{ $player->getPosition() }}</div>
                    <div class="col-lg-12">Appearances: {{ $appearances }} (out of {{ $team->getNumberOfFixtures($player->misc['club']) }})</div>
                    <div class="col-lg-12">Goals: {{ $player->getGoals() }}</div>
                    <div class="col-lg-12">Assists: {{ $player->getAssists() }}</div>
                    <div class="col-lg-12">Man Of The Match: {{ $player->getMOTMs() }}</div>
                </div>
                <div class="col-lg-4">
                    <div class="col-lg-12">Morale: {{ $player->getMorale(true) }}</div>
                    <div class="col-lg-12">Contract Expiry: {{ $player->getContractExpiry()->format('jS F Y') }}</div>
                    <div class="col-lg-12">Form: {{ $player->getForm(true) }}</div>
                    <div class="col-lg-12">Value: &pound;{{ $player->getValue() }}</div>
                </div>
                <div class="col-lg-4">
                    <div class="col-lg-12">Name On Shirt: {{ $player->getName('surname') }}</div>
                    <div class="col-lg-12">Goals Per Game: {{ $goalsPerGame }}</div>
                    <div class="col-lg-12">Assists Per Game: {{ $assistsPerGame }}</div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">Current Status: {{ $player->getQuote() }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">Match Eligibility Status: {{ $player->getStatus() }}</div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
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