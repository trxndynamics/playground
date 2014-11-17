@extends('layouts/master')

@section('additionalCSS')
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/js/phaser/phaser.min.js"></script>
@stop

@section('content')

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
            sprite.body.allowRotation = false;
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
