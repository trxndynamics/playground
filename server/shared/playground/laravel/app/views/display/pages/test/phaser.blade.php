@extends('layouts/master')

@section('additionalCSS')
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/js/phaser/phaser.min.js"></script>
@stop

@section('content')

<?php

$teams = [
    'home' => ['name'=>'Bayern München'],
    'away' => ['name'=>'Borussia Dortmund']
];

foreach($teams as $key => &$team){
    $teams[$key]['team']    = Team::where('name','=',$team['name'])->first();
    $teams[$key]['squad']   = $teams[$key]['team']->generateSquad()['squad'];
}

$teamCounter = 1;
foreach(['home','away'] as $homeOrAway){
    $counter = 1;
    foreach($teams[$homeOrAway]['squad'] as $name => $player){
        $coordinates = $player->getStartingPosition();

        $players['t'.$teamCounter.'p'.$counter] = [
            'src'   => $player->getImageFace(),
            'xpos'  => $coordinates[0],
            'ypos'  => 100 * $teamCounter
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

                var game = new Phaser.Game(800, 600, Phaser.AUTO, 'game-container', { preload: preload, create: create });

                function preload () {
                    game.load.image('logo', '/resource/images/examples/phaser.png');

                    <?php   foreach($players as $ref=>$player){ ?>
                    game.load.image('<?php echo $ref; ?>', '<?php echo $player["src"]; ?>');
                    <?php   } ?>
                }

                function create () {
                    var logo = game.add.sprite(game.world.centerX, game.world.centerY, 'logo');
                    logo.anchor.setTo(0.5, 0.5);

                    <?php
                     $offset = 0;
                    foreach($players as $ref => $player){
                        $offset += 70;
                    ?>

                    var <?php echo $ref;?> = game.add.sprite(<?php echo $player['xpos'] ?>, <?php echo $player['ypos'] ?>, '<?php echo $ref; ?>');
                    <?php echo $ref; ?>.anchor.setTo(0.5, 0.5);

                    <?php echo $ref; ?>.width = 100;
                    <?php echo $ref; ?>.height = 100;
                    <?php echo $ref; ?>.body.setSize(100,100);

                    <?php
                    } ?>
                }
            };
        </script>
    </div>
    <div id="game-container"></div>
</div>
@stop
