<?php

class Player extends Moloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'players';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();


    public function getImageFace(){
        return isset($this->playerCard['picture']) ? app_images_faces_path(false).$this->playerCard['picture'] : null;
    }

    public function getImageNation(){
        return isset($this->playerCard['nation']) ? app_images_nation_path(false).$this->playerCard['nation'] : null;
    }

    public function getImageClub(){
        return isset($this->playerCard['club']) ? app_images_club_crest_path(false).'13/'.str_replace(' ','_',mb_strtolower($this->misc['club'])).'/crest.png' : null;
    }

    public function getFitness(){
        return rand(0,100);
    }
}