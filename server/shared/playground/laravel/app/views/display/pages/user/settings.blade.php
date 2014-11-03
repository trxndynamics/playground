@extends('layouts/master')

@section('additionalCSS')
@stop

@section('additionalJS')
@stop

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Settings</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12" >
                Available Settings: <br />
                <br />
                <a href="/user/settings/fixtures/generate">Generate Fixtures</a><br />
                <a href="/user/settings/goals/generate">Generate Goals</a><br />
                <a href="/user/settings/assists/generate">Generate Assists</a><br />
                <a href="/user/settings/results/generate">Generate Results</a><br />
                <a href="/user/settings/player/fix">Fix Player Values</a><br />
                <a href="/team/select-kit">Change Kit</a><br />
                <a href="/user/settings/player/reviewPlayerCompete">Review Player Compete</a><br />
            </div>
        </div>
    </div>
</div>
@stop