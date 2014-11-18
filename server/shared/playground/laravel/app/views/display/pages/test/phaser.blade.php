@extends('layouts/master')

@section('additionalCSS')
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/js/phaser/phaser.min.js"></script>
@stop

@section('content')

<?php

$gameWidth = 1100;
$gameHeight = 600;

$match      = Match::first();
$matchball  = $match->getMatchBall();

$ballAttributes = [
    'xpos'      => ($gameWidth / 2) - 15,
    'ypos'      => ($gameHeight / 2) - 15,
    'width'     => 30,
    'height'    => 30
];

$teams = [
    'home' => ['name'=>'Bayern München'],
    'away' => ['name'=>'Eintracht Frankfurt']
];

foreach($teams as $key => &$team){
    $teams[$key]['team']    = Team::where('name','=',$team['name'])->first();
    $teams[$key]['squad']   = $teams[$key]['team']->generateSquad()['squad'];
}

$teamCounter = 1;

foreach(['home','away'] as $homeOrAway){
    $quantities     = [];
    $counter        = 1;

    foreach($teams[$homeOrAway]['squad'] as $name => $player){
        $position = $player->getPosition();

        if(isset($quantities[$position])){
            $quantities[$position]++;
        } else {
            $quantities[$position] = 1;
        }
    }

    foreach($teams[$homeOrAway]['squad'] as $name => $player){
        $position       = $player->getPosition();
        $coordinates    = $player->getStartingPosition();
        $ypos           = $coordinates[1];

        if(isset($quantities[$position])){
            $ypos += 75;
            if($quantities[$position] > 1){
                $ypos += $quantities[$position] * 75;
                $quantities[$position]--;
            }
        }

        $players['t'.$teamCounter.'p'.$counter] = [
            'src'   => $player->getImageFace(),
            'xpos'  => ($teamCounter == 1) ? $coordinates[0] : $gameWidth - $coordinates[0],
            'ypos'  => $ypos,
            'name'  => $player->misc['name'],
            'position' => strtolower($player->getPosition()),
            'speed' => isset($player->attributes['sprint speed']) ? $player->attributes['sprint speed'] : '00'
        ];
        $counter++;
    }
    $teamCounter++;
}


?>
<div class="container">
    <h3>{{ $teams['home']['name'] }} <span id="homeScore">0</span> - <span id="awayScore">0</span> {{ $teams['away']['name'] }}</h3>
    <h4><span id="scorers"></span></h4>
    <hr>
    <div class="row">
        <script type="text/javascript">
            window.onload = function() {

                var game = new Phaser.Game({{ $gameWidth }}, {{ $gameHeight }}, Phaser.AUTO, 'game-container', { preload: preload, create: create, update: update, render: render });
                var matchball;
                var leftgoalline;
                var rightgoalline;
                var pitch;
                var text;
                var homegoals = 0;
                var awaygoals = 0;
                var goalregistered = false;
                var lastplayertouched = '';
                var scorers = [];

                <?php foreach($players as $ref=>$player){ ?>
                var {{ $ref }};
                <?php } ?>

                function preload () {
                    game.load.image('logo', '/resource/images/examples/phaser.png');
                    game.load.image('matchball', '{{ $matchball }}');
                    game.load.image('pitch', '/resource/images/pitch/football_pitch-wallpaper-1440x900.jpg');
                    game.load.image('leftgoalline', '/resource/images/misc/transparent/transparency10.png');
                    game.load.image('rightgoalline', '/resource/images/misc/transparent/transparency10.png');

                    <?php   foreach($players as $ref=>$player){ ?>
                    game.load.image('<?php echo $ref; ?>', '<?php echo $player["src"]; ?>');
                    <?php   } ?>
                }

                function create () {
                    game.physics.startSystem(Phaser.Physics.ARCADE);

                    pitch = game.add.sprite(0,0,'pitch');
                    matchball = game.add.sprite({{ $ballAttributes['xpos'] }}, {{ $ballAttributes['ypos'] }}, 'matchball');
                    leftgoalline = game.add.sprite(55,260,'leftgoalline');
                    rightgoalline = game.add.sprite({{ $gameWidth - 58 }},260,'rightgoalline');

                    leftgoalline.width = 5;
                    leftgoalline.height = 80;

                    rightgoalline.width = 5;
                    rightgoalline.height = 80;

                    pitch.width = {{ $gameWidth }};
                    pitch.height = {{ $gameHeight }};

                    matchball.width = {{ $ballAttributes['width'] }};
                    matchball.height = {{ $ballAttributes['height'] }};

                    <?php
                     $offset = 0;
                    foreach($players as $ref => $player){
                        $offset += 70;
                    ?>

                    <?php echo $ref;?> = game.add.sprite(<?php echo $player['xpos'] ?>, <?php echo $player['ypos'] ?>, '<?php echo $ref; ?>');
                    <?php echo $ref; ?>.anchor.setTo(0.5, 0.5);

                    <?php echo $ref; ?>.width = 50;
                    <?php echo $ref; ?>.height = 50;
                    game.physics.enable(<?php echo $ref; ?>, Phaser.Physics.ARCADE);

                    <?php
                    } ?>

                    game.physics.enable(matchball, Phaser.Physics.ARCADE);
                    game.physics.enable(leftgoalline, Phaser.Physics.ARCADE);
                    game.physics.enable(rightgoalline, Phaser.Physics.ARCADE);

                    matchball.body.allowRotation = false;

                    text = game.add.text(16, 16, '', { fill: '#ffffff' });
                }

                function update(){
                    matchball.rotation = game.physics.arcade.moveToPointer(matchball, 150, game.input.activePointer, 500);

                    <?php foreach($players as $ref => $player){
                    if($player['position'] == 'gk') continue;
                    ?>
                    if(checkOverlap(matchball, {{ $ref }})){
                        lastplayertouched = '{{ $player['name']; }}';
                    }
                    <?php echo $ref; ?>.rotation = game.physics.arcade.moveToObject(<?php echo $ref; ?>, matchball, 60, 1<?php echo $player['speed']; ?>0);
                    <?php } ?>

                    if (checkOverlap(matchball, leftgoalline)){
                        if(goalregistered != true){
                            homegoals++;
                            goalregistered = true;
                            $('#homeScore').text(homegoals);
                            scorers.push(lastplayertouched);
                            text.text = 'Goal: <?php echo $teams['home']['name']; ?> '+lastplayertouched;
                            $('#scorers').text(scorers);
                        }
                    } else if (checkOverlap(matchball, rightgoalline)){
                        if(goalregistered != true){
                            awaygoals++;
                            $('#awayScore').text(awaygoals);
                            goalregistered = true;
                            scorers.push(lastplayertouched);
                            text.text = 'Goal: <?php echo $teams['away']['name']; ?> '+lastplayertouched;
                            $('#scorers').text(scorers);
                        }
                    } else {
                        text.text = '';
                        goalregistered = false;
                    }

                }

                function checkOverlap(spriteA, spriteB) {
                    var boundsA = spriteA.getBounds();
                    var boundsB = spriteB.getBounds();
                    return Phaser.Rectangle.intersects(boundsA, boundsB);
                }

                function render(){
//                    game.debug.spriteInfo(matchball, 32, 32);
                }
            };
        </script>
    </div>
    <div id="game-container"></div>
</div>
@stop
