@extends('layouts/master')

@section('additionalJS')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/resource/js/select-kit.js"></script>
@stop

@section('additionalCSS')
<link rel="stylesheet" type="text/css" media="all" href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.css" />
@stop

@section('content')

<div class="container">
    <div class="row">
        <h2>Select Kit</h2>
    </div>
</div>
<div class="select-kit-display broun-block">
    <div class="container">
        <div class="row">

            <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Team Name</th>
                            <th>Kits</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach(glob(base_path().'/public/resource/images/kits/*') as $teamKitPath){
                        if(!is_dir($teamKitPath))   continue;

                        $kitFolder  = str_replace('/var/www/playground/laravel/public', '', $teamKitPath);
                        $teamName   = str_replace('/var/www/playground/laravel/public/resource/images/kits/', ' ', $teamKitPath);
                        $teamName   = ucwords(str_replace('_', ' ',$teamName));

                    ?>
                        <tr>
                            <td>{{ $teamName }}</td>
                            <td>
                                <?php

                        foreach(glob($teamKitPath.'/*') as $teamKitPathSeason){
                            if(!is_dir($teamKitPathSeason)) continue;

                            foreach(glob($teamKitPathSeason.'/*.{jpg,png,gif}', GLOB_BRACE) as $kitPath){
                                if(is_dir($kitPath))    continue;
                                ?>
                                <img class="kit" data-src-ref="<?php echo str_replace('/var/www/playground/laravel/public','',$kitPath); ?>" width="50" src="" style="margin-bottom:10px; margin-right:10px; display:block; float:left">
                    <?php   }
                        }
                    ?>
                            </td>
                        </tr>
            <?php   } ?>
                    </tbody>
                </table>

        </div>
    </div>
</div>
@stop