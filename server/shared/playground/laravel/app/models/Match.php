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
        return isset($this->attendance) ? $this->attendance : rand(0,70000);
    }

    /**
     * returns the match earnings
     *
     * @return int
     */
    public function getMatchEarnings($homeOrAway='home'){
        if($homeOrAway === 'home'){
            return isset($this->homeEarnings) ? $this->homeEarnings : rand(0,100000);
        } else if($homeOrAway === 'neutral') {
            return isset($this->homeEarnings) ? $this->homeEarnings : rand(0, 50000);
        } else {
            return isset($this->awayEarnings) ? $this->awayEarnings : rand(0,25000);
        }
    }

    /**
     * returns the type of match fixture
     *
     * @return string
     */
    public function getFixtureType(){
        return ($this->type == 'league') ? $this->league : 'Friendly';
    }

    public function generateResult(){
        //todo add in comparison between teams and players
        $this->homeGoals    = $this->getGoals('home');
        $this->awayGoals    = $this->getGoals('away');
        $this->homeEarnings = $this->getMatchEarnings('home');
        $this->awayEarnings = $this->getMatchEarnings('away');
        $this->attendance   = $this->getAttendance();

        $this->save();
    }

    public function getResult(){
        return $this->getGoals('home').'-'.$this->getGoals('away');
    }

    public function getGoals($homeOrAway='home'){
        //todo add in comparison for players
        if($homeOrAway === 'home'){
            return (isset($this->homeGoals)) ? $this->homeGoals : rand(0,5);
        } else {
            return (isset($this->awayGoals)) ? $this->awayGoals : rand(0,5);
        }
    }
}
