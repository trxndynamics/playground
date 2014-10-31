@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/bootsnipp/simple-user-profile/simple-user-profile.css">
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/simple-user-profile/simple-user-profile.js"></script>
@stop

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>User Profile</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $user->forename }} {{ $user->surname }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>

                            <div class="col-md-9 col-lg-9">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Aim</td>
                                        <td>{{ $user->aim }}</td>
                                    </tr>
                                    <tr>
                                        <td>Club:</td>
                                        <td>{{ $user->club }}</td>
                                    </tr>
                                    <tr>
                                        <td>League</td>
                                        <td>{{ $user->league }}</td>
                                    </tr>
                                    <tr>
                                        <td>Created Date:</td>
                                        <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{ $user->gender }}</td>
                                    </tr>

                                    <tr>
                                        <td>Kits</td>
                                        <td>
                                            <img class="kit-display" src="{{ $user->goalkeeper_kit }}" /><br />Goalkeeper<br />
                                            <img class="kit-display" src="{{ $user->home_kit }}" /><br />Home<br />
                                            <img class="kit-display" src="{{ $user->away_kit }}" /><br />Away<br />
                                            <img class="kit-display" src="{{ $user->third_kit }}" /><br />Third<br />
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <a href="/squad/current" class="btn btn-primary">Current Squad</a>
                                <a href="/league/table" class="btn btn-primary">League Table</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop