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
                <a href="/user/settings/fixtures/generate">Change Kit</a>
            </div>
        </div>
    </div>
</div>
@stop