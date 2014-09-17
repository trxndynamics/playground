@extends('layouts/master')

@section('additionalCSS')
@stop

@section('additionalJS')
<script type="text/javascript" src="/resource/js/nnnick/Chart.min.js"></script>
@stop

@section('content')
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
                labels : ["August","September","October","November","December","January","February","March","April"],
                datasets : [
                    {
                        label: "Team #1",
                        fillColor : "rgba(220,220,220,0.2)",
                        strokeColor : "rgba(220,220,220,1)",
                        pointColor : "rgba(220,220,220,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(220,220,220,1)",
                        data : [1,5,8,13,10,6,5,7,4]
                    },
                    {
                        label: "Team #2",
                        fillColor : "rgba(151,187,205,0.2)",
                        strokeColor : "rgba(151,187,205,1)",
                        pointColor : "rgba(151,187,205,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(151,187,205,1)",
                        data : [2,3,4,2,1,3,4,5,5]
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
