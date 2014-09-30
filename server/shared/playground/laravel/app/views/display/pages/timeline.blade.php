@extends('layouts/master')

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="/resource/misc/vertical-timeline/css/bootstrap-glyphicons.css">
<link rel="stylesheet" type="text/css" media="all" href="/resource/misc/vertical-timeline/css/styles.css">
@stop

@section('content')

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <li><div class="tldate">Pre Match</div></li>

                    <li class="timeline-inverted">
                        <div class="tl-circ"></div>
                        <div class="timeline-panel">
                            <div class="tl-heading">
                                <h4>{{ $user->club }} Squad Announced</h4>
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 2:30 pm</small></p>
                            </div>
                            <div class="tl-body">
                                @foreach($players as $player)
                                <p>{{ $player->getPosition() }} - {{ $player->misc['name'] }} </p>
                                @endforeach

                                <?php
                                //todo use similar behaviour to the opposition
                                ?>
                            </div>
                        </div>
                    </li>

                    <li class="timeline">
                        <div class="tl-circ"></div>
                        <div class="timeline-panel">
                            <div class="tl-heading">
                                <h4>{{ $opposition->name }} Squad Announced</h4>
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 2:30 pm</small></p>
                            </div>
                            <div class="tl-body">
                                @foreach(['Goalkeeper','Defender','Midfielder','Forward'] as $position)
                                    @foreach($opposition->filterTeamByPosition('squad',$position) as $player)
                                    <p>{{ $player->getPosition() }} - {{ $player->misc['name'] }} </p>
                                    @endforeach
                                @endforeach

                                <br />
                                ------<br />
                                Bench<br />
                                <br />

                                @foreach(['Goalkeeper','Defender','Midfielder','Forward'] as $position)
                                    @foreach($opposition->filterTeamByPosition('bench',$position) as $player)
                                    <p>{{ $player->getPosition() }} - {{ $player->misc['name'] }} </p>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </li>

                    <li><div class="tldate">Kick Off</div></li>

                    <li>
                        <div class="tl-circ"></div>
                        <div class="timeline-panel">
                            <div class="tl-heading">
                                <h4>Team #1: Match Event #1</h4>
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3:03 pm</small></p>
                            </div>
                            <div class="tl-body">
                                <p>PlayerRole PlayerName shoots from PitchPosition towards GoalPosition.</p>
                            </div>
                        </div>
                    </li>

                    <li class="timeline-inverted">
                        <div class="tl-circ"></div>
                        <div class="timeline-panel">
                            <div class="tl-heading">
                                <h4>Team #1: Match Event #2</h4>
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3:15 pm</small></p>
                            </div>
                            <div class="tl-body">
                                <p>PlayerName sent off for PlayerAction</p>
                            </div>
                        </div>
                    </li>

                    <li><div class="tldate">Half Time</div></li>

                    <li class="timeline-inverted">
                        <div class="tl-circ"></div>
                        <div class="timeline-panel">
                            <div class="tl-heading">
                                <h4>Team #2: Match Event #3 Goal for PlayerName</h4>
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 4:38pm</small></p>
                            </div>
                            <div class="tl-body">
                                <p>PlayerName scores for TeamName</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="tl-circ"></div>
                        <div class="timeline-panel">
                            <div class="tl-heading">
                                <h4>Full Time Stats</h4>
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 4:48pm</small></p>
                            </div>
                            <div class="tl-body">
                                <p>Shots 11 - 10</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop