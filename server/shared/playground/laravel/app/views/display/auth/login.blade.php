@extends('layouts/master')
@section('content')

@if ($error !== null)
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="alert alert-dismissable alert-warning">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <h4>Warning!</h4>
            <p>Incorrect login credentials</p>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                                </label><br />
                                <a href="/auth/register">Register Here</a>
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>