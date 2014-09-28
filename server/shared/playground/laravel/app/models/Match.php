<?php

class Match extends Moloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'matches';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();

    public function getAttendance(){
        return rand(0,70000);
    }

    public function getMatchEarnings(){
        return rand(0,100000);
    }
}
