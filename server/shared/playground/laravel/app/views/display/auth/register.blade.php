@extends('layouts/master')
@section('content')

@if ($error !== null)
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="alert alert-dismissable alert-danger">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <h4>Warning!</h4>
            <p>Unable to create new user account due to one of the following reasons: <br /><br />
                Email address is not valid<br />
                Email is already in use<br />
                Passwords do not match
            </p>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Register</h3>
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
                            <div class="form-group">
                                <input class="form-control" placeholder="Password Confirm" name="password_confirm" type="password" value="">
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Register">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>