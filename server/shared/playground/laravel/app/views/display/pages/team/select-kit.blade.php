@extends('layouts/master')

@section('content')

<div class="container">
    <div class="row">
        <h2>Select Kit</h2>
    </div>
</div>
<div class="carousel-reviews broun-block">
    <div class="container">
        <div class="row">
            <?php
             foreach(glob(base_path().'/public/resource/images/kits/*') as $teamKitPath){
                if(!is_dir($teamKitPath))   continue;

                foreach(glob($teamKitPath.'/*') as $teamKitPathSeason){
                    if(!is_dir($teamKitPathSeason)) continue;

                    foreach(glob($teamKitPathSeason.'/*.{jpg,png,gif}', GLOB_BRACE) as $kitPath){
                        if(is_dir($kitPath))    continue;

                        ?>
                        <img width="150" src="<?php echo str_replace('/var/www/playground/laravel/public','',$kitPath); ?>" style="margin-bottom:10px; margin-right:10px; display:block; float:left">
                        <?php
                    }
                }
             }
            ?>
        </div>
    </div>
</div>
@stop