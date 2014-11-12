@extends('layouts/master')

@section('additionalCSS')
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/js/phaser/phaser.min.js"></script>
@stop

@section('content')

<?php

$players = [
    't1p1' => array('src'=>'/resource/images/player/faces/2.png', 'xpos' => 70, 'ypos' => 0),
    't1p2' => array('src'=>'/resource/images/player/faces/16.png', 'xpos' => 140, 'ypos' => 0),
    't1p3' => array('src'=>'/resource/images/player/faces/27.png', 'xpos' => 210, 'ypos' => 0),
    't1p4' => array('src'=>'/resource/images/player/faces/41.png', 'xpos' => 280, 'ypos' => 0),
    't1p5' => array('src'=>'/resource/images/player/faces/58.png', 'xpos' => 350, 'ypos' => 0),
    't1p6' => array('src'=>'/resource/images/player/faces/80.png', 'xpos' => 420, 'ypos' => 0),
    't1p7' => array('src'=>'/resource/images/player/faces/164.png', 'xpos' => 490, 'ypos' => 0),
    't1p8' => array('src'=>'/resource/images/player/faces/201.png', 'xpos' => 560, 'ypos' => 0),
    't1p9' => array('src'=>'/resource/images/player/faces/241.png', 'xpos' => 630, 'ypos' => 0),
    't1p10' => array('src'=>'/resource/images/player/faces/250.png', 'xpos' => 700, 'ypos' => 0),
    't1p11' => array('src'=>'/resource/images/player/faces/11.png', 'xpos' => 770, 'ypos' => 0)
];

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

                    var <?php echo $ref;?> = game.add.sprite(<?php echo $player['xpos'] ?>, game.world.centerY, '<?php echo $ref; ?>');
                    <?php echo $ref; ?>.anchor.setTo(0.5, 0.5);

                    <?php
                    } ?>
                }
            };
        </script>
    </div>
    <div id="game-container"></div>
</div>
@stop
