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
            window.onload = function() {

                var game = new Phaser.Game(800, 600, Phaser.AUTO, 'game-container', { preload: preload, create: create });

                function preload () {
                    game.load.image('logo', '/resource/images/examples/phaser.png');
                }

                function create () {
                    var logo = game.add.sprite(game.world.centerX, game.world.centerY, 'logo');
                    logo.anchor.setTo(0.5, 0.5);
                }
            };
        </script>
    </div>
    <div id="game-container"></div>
</div>
@stop
