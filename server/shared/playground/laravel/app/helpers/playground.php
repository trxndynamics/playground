<?php

if ( ! function_exists('app_images_faces_path'))
{
    /**
     * Get the path to the application folder.
     *
     * @param  string  $path
     * @return string
     */

    function app_images_faces_path()
    {
        return public_path().'/resource/images/player/faces/';
    }
}

if ( ! function_exists('app_images_nation_path'))
{
    function app_images_nation_path()
    {
        return public_path().'/resource/images/nation/';
    }
}

if ( ! function_exists('app_images_club_crest_path'))
{
    function app_images_club_crest_path()
    {
        return public_path().'/resource/images/crests/';
    }
}

if ( ! function_exists('app_images_cards_path'))
{
    function app_images_cards_path()
    {
        return public_path().'/resource/images/cards/';
    }
}

if ( ! function_exists('app_images_stadiums_path'))
{
    function app_images_stadiums_path()
    {
        return public_path().'/resource/images/stadiums/';
    }
}

if ( ! function_exists('app_images_kits_path'))
{
    function app_images_kits_path()
    {
        return public_path().'/resource/images/kits/';
    }
}