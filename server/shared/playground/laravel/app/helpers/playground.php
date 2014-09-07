<?php

if ( ! function_exists('app_images_faces_path'))
{
    /**
     * Get the path to the application folder.
     *
     * @param  string  $path
     * @return string
     */

    function app_images_faces_path($incPublicPath=true)
    {
        return ($incPublicPath===true) ? public_path().'/resource/images/player/faces/' : '/resource/images/player/faces/';
    }
}

if ( ! function_exists('app_images_nation_path'))
{
    function app_images_nation_path($incPublicPath=true)
    {
        return ($incPublicPath===true) ? public_path().'/resource/images/nation/' : '/resource/images/nation/';
    }
}

if ( ! function_exists('app_images_club_crest_path'))
{
    function app_images_club_crest_path($incPublicPath=true)
    {
        return ($incPublicPath===true) ? public_path().'/resource/images/crests/' : '/resource/images/crests/';
    }
}

if ( ! function_exists('app_images_cards_path'))
{
    function app_images_cards_path($incPublicPath=true)
    {
        return ($incPublicPath===true) ? public_path().'/resource/images/cards/' : '/resource/images/cards/';
    }
}

if ( ! function_exists('app_images_stadiums_path'))
{
    function app_images_stadiums_path($incPublicPath=true)
    {
        return ($incPublicPath===true) ? public_path().'/resource/images/stadiums/' : '/resource/images/stadiums/';
    }
}

if ( ! function_exists('app_images_kits_path'))
{
    function app_images_kits_path($incPublicPath=true)
    {
        return ($incPublicPath===true) ? public_path().'/resource/images/kits/' : '/resource/images/kits/';
    }
}

if ( !function_exists('app_images_match_path'))
{
    function app_images_match_path($incPublicPath=true)
    {
        return ($incPublicPath===true) ? public_path().'/resource/images/match/' : '/resource/images/match/';
    }
}