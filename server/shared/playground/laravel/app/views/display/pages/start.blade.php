@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" href="/resource/bootsnipp/content-in-bootstrap-tabs.css" />
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/bootsnipp/content-in-bootstrap-tabs.js"></script>
@stop

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="board">
                <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                        <div class="liner"></div>
                        <li class="active" id="step-welcome">
                            <a href="#home" data-toggle="tab" title="welcome">
                                <span class="round-tabs one">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                            </a>
                        </li>

                        <li id="step-profile">
                            <a href="#profile" data-toggle="tab" title="profile">
                                <span class="round-tabs two">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                            </a>
                        </li>
                        <li id="step-select-club">
                            <a href="#messages" data-toggle="tab" title="select club">
                                <span class="round-tabs three">
                                    <i class="glyphicon glyphicon-globe"></i>
                                </span>
                            </a>
                        </li>

                        <li id="select-read-desc">
                            <a href="#settings" data-toggle="tab" title="targets">
                                <span class="round-tabs four">
                                    <i class="glyphicon glyphicon-comment"></i>
                                </span>
                            </a>
                        </li>

                        <li id="step-confirm">
                            <a href="#doner" data-toggle="tab" title="confirm">
                                <span class="round-tabs five">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">

                        <h3 class="head text-center">First Time Manager Setup</h3>
                        <p class="narrow text-center">
                            In order to start your managerial career we are going to require a few details.
                        </p>

                        <p class="text-center">
                            <a href="" id="get-started-next" class="btn btn-success btn-outline-rounded green">Get Started</a>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <h3 class="head text-center">Managerial Profile</h3>
                        <p class="narrow text-center">
                            Lets kick start the career by letting the press get to know you.
                        </p>

                        <form class="form-horizontal">
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="forename">Forename</label>
                                    <div class="col-md-4">
                                        <input id="forename" name="forename" type="text" placeholder="forename" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="surname">Surname</label>
                                    <div class="col-md-4">
                                        <input id="surname" name="surname" type="text" placeholder="surname" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Multiple Radios (inline) -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="gender">Gender</label>
                                    <div class="col-md-4">
                                        <label class="radio-inline" for="gender-0">
                                            <input type="radio" name="gender" id="gender-0" value="Male" checked="checked">
                                            Male
                                        </label>
                                        <label class="radio-inline" for="gender-1">
                                            <input type="radio" name="gender" id="gender-1" value="Female">
                                            Female
                                        </label>
                                    </div>
                                </div>

                            </fieldset>
                        </form>

                        <p class="text-center">
                            <a href="" id="profile-next" class="btn btn-success btn-outline-rounded green"> Continue</a>
                        </p>

                    </div>
                    <div class="tab-pane fade" id="messages">
                        <h3 class="head text-center">Select a Team</h3>
                        <p class="narrow text-center">
                            Seeing as you&apos;re regarded as the next big up and coming manager.  <br />You get to pick which club you wish to manage.
                        </p>

                        <form class="form-horizontal">
                            <fieldset>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="selectLeague">Select League</label>
                                    <div class="col-md-4">
                                        <select id="selectLeague" name="selectLeague" class="form-control">
                                            <option value="1">Bundesliga</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="selectClub">Select Club</label>
                                    <div class="col-md-4">
                                        <select id="selectClub" name="selectClub" class="form-control">
                                            <option value="Bayer Leverkusen">Bayer Leverkusen</option>
                                            <option value="FC Bayern Munchen">FC Bayern Munchen</option>
                                            <option value="Borussia Dortmund">Borussia Dortmund</option>
                                            <option value="Borussia Mochengladbach">Borussia Mochengladbach</option>
                                            <option value="FC Augsburg">FC Augsburg</option>
                                            <option value="Eintracht Frankfurt">Eintracht Frankfurt</option>
                                            <option value="SC Freiburg">SC Freiburg</option>
                                            <option value="Hamburger SV">Hamburger SV</option>
                                            <option value="Hannover 96">Hannover 96</option>
                                            <option value="Hertha Berlin">Hertha Berlin</option>
                                            <option value="TSG 1899 Hoffenheim">TSG 1899 Hoffenheim</option>
                                            <option value="1. FC Koln">1. FC Koln</option>
                                            <option value="1. FSV Mainz 05">1. FSV Mainz 05</option>
                                            <option value="SC Paderborn 07">SC Paderborn 07</option>
                                            <option value="FC Schalke 04">FC Schalke 04</option>
                                            <option value="VfB Stuttgart">VfB Stuttgart</option>
                                            <option value="SV Werder Bremen">SV Werder Bremen</option>
                                            <option value="VfL Wolfsburg">VfL Wolfsburg</option>
                                        </select>
                                    </div>
                                </div>

                            </fieldset>
                        </form>

                        <p class="text-center">
                            <a href="" id="select-club-next" class="btn btn-success btn-outline-rounded green"> Continue</a>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="settings">
                        <h3 class="head text-center">Set Objective</h3>
                        <p class="narrow text-center">

                            The chairman and fans would like to know what is your main objective.
                        </p>

                        <form class="form-horizontal">
                            <fieldset>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="selectAims">Select Target</label>
                                    <div class="col-md-4">
                                        <select id="selectAims" name="selectAims" class="form-control">
                                            <option value="League and Cup Success">League and Cup Success</option>
                                            <option value="League Success">League Success</option>
                                            <option value="Cup Success">Cup Success</option>
                                            <option value="Survival">Survival</option>
                                            <option value="Financial Security">Financial Security</option>
                                        </select>
                                    </div>
                                </div>

                            </fieldset>
                        </form>

                        <p class="text-center">
                            <a href="" id="select-target-next" class="btn btn-success btn-outline-rounded green"> Continue</a>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="doner">
                        <div class="text-center">
                            <i class="img-intro icon-checkmark-circle"></i>
                        </div>
                        <h3 class="head text-center">Review and Confirm</h3>
                        <p class="narrow text-center">
                            <span id="displayForename">Forename</span> <span id="displaySurname">Surname</span> is set to take the reigns at <span id="displayClubName">Club Name</span>.<br /><br />
                            While the future is considerably uncertain,<br />the manager would like to state his desire for <span id="displayAims">Aim</span>.
                        </p>

                        <p class="text-center">
                            <a href="" id="select-confirm-next" class="btn btn-success btn-outline-rounded green"> Continue</a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <form id="finalForm" action="" method="post">
        <input type="hidden" name="gender" id="finalGender" value="" />
        <input type="hidden" name="forename" id="finalForename" value="" />
        <input type="hidden" name="surname" id="finalSurname" value="" />
        <input type="hidden" name="league" id="finalLeague" value="" />
        <input type="hidden" name="club" id="finalClub" value="" />
        <input type="hidden" name="aim" id="finalAim" value="" />
    </form>
</section>
@stop