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

    /**
     * returns the match attendance
     *
     * @return int
     */
    public function getAttendance(){
        return rand(0,70000);
    }

    /**
     * returns the match earnings
     *
     * @return int
     */
    public function getMatchEarnings(){
        return rand(0,100000);
    }

    /**
     * returns the type of match fixture
     *
     * @return string
     */
    public function getFixtureType(){
        return ($this->type == 'league') ? $this->league : 'Friendly';
    }

    public function getResult(){
        return $this->getGoals('home').'-'.$this->getGoals('away');
    }

    public function getGoals($homeOrAway='home'){
        return rand(0,5);
    }
}
