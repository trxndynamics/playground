@extends('layouts/master')

@section('additionalCSS')
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/js/nnnick/Chart.min.js"></script>
@stop

@section('content')
<?php $finances = $team->getFinances(); ?>
<div class="container">
    <h3>Finances (£m)</h3>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <div>
                <canvas id="canvas" ></canvas>
            </div>
        </div>
        <script>
            var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
            var lineChartData = {
                labels : ["{{ implode('","',array_keys($finances)) }}"],
                datasets : [
                    {
                        label: "Team #1",
                        fillColor : "rgba(220,220,220,0.2)",
                        strokeColor : "rgba(220,220,220,1)",
                        pointColor : "rgba(220,220,220,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(220,220,220,1)",
                        data : [{{ implode(',',array_values($finances)) }}]
                    }
                ]
            }

            window.onload = function(){
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myLine = new Chart(ctx).Line(lineChartData, {
                    responsive: true
                });
            }
        </script>
    </div>
</div>
@stop
