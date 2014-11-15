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

$teams = [
    'home' => ['name'=>'Bayern München'],
    'away' => ['name'=>'Borussia Dortmund']
];

foreach($teams as $key => &$team){
    $teams[$key]['team']    = Team::where('name','=',$team['name'])->first();
    $teams[$key]['squad']   = $teams[$key]['team']->generateSquad()['squad'];
}

$teamCounter    = 1;

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
            'ypos'  => $ypos
        ];
        $counter++;
    }
    $teamCounter++;
}


?>
<div class="container">
    <h3>Phaser Example</h3>
    <hr>
    <div class="row">
        <script type="text/javascript">
            window.onload = function() {

                var game = new Phaser.Game({{ $gameWidth }}, {{ $gameHeight }}, Phaser.AUTO, 'game-container', { preload: preload, create: create });

                function preload () {
                    game.load.image('logo', '/resource/images/examples/phaser.png');

                    <?php   foreach($players as $ref=>$player){ ?>
                    game.load.image('<?php echo $ref; ?>', '<?php echo $player["src"]; ?>');
                    <?php   } ?>
                }

                function create () {
                    game.stage.backgroundColor = '#1EB320'

                    <?php
                     $offset = 0;
                    foreach($players as $ref => $player){
                        $offset += 70;
                    ?>

                    var <?php echo $ref;?> = game.add.sprite(<?php echo $player['xpos'] ?>, <?php echo $player['ypos'] ?>, '<?php echo $ref; ?>');
                    <?php echo $ref; ?>.anchor.setTo(0.5, 0.5);

                    <?php echo $ref; ?>.width = 50;
                    <?php echo $ref; ?>.height = 50;
                    <?php echo $ref; ?>.body.setSize(50,50);

                    <?php
                    } ?>
                }
            };
        </script>
    </div>
    <div id="game-container"></div>
</div>
@stop
