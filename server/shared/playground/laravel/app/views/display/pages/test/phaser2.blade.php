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
    'away' => ['name'=>'Bayer 04 Leverkusen']
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
        var game = new Phaser.Game(800, 600, Phaser.AUTO, 'game-container', { preload: preload, create: create, update: update, render: render });

        function preload() {
            game.load.image('arrow', '/resource/images/balls/adidas/afra-omb-13.png');
        }

        var sprite;

        function create() {
            game.physics.startSystem(Phaser.Physics.ARCADE);
            game.stage.backgroundColor = '#0072bc';
            sprite = game.add.sprite(400, 300, 'arrow');
            sprite.anchor.setTo(0.5, 0.5);
            game.physics.enable(sprite, Phaser.Physics.ARCADE);
            sprite.body.allowRotation = true;
        }

        function update() {
            sprite.rotation = game.physics.arcade.moveToPointer(sprite, 60, game.input.activePointer, 500);
        }

        function render() {
            game.debug.spriteInfo(sprite, 32, 32);
        }
    </script>
    <div id="game-container"></div>
    </div>
</div>
@stop
