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

    public function getResult($displayType='overview', $verbose=true){
        if($displayType == $this->home)         $displayType = 'home';
        else if($displayType == $this->away)    $displayType = 'away';

        //todo tidy this up, home goals and away goals should be easily swappable inside this case statement, seems unnecessarily duplicated here
        switch($displayType){
            case 'home':
                if($this->homeGoals === $this->awayGoals)       return ($verbose) ? 'Draw' : 'D';
                else if($this->homeGoals < $this->awayGoals)    return ($verbose) ? 'Loss' : 'L';
                else if($this->homeGoals > $this->awayGoals)    return ($verbose) ? 'Win' : 'W';
                break;
            case 'away':
                if($this->awayGoals === $this->homeGoals)       return ($verbose) ? 'Draw' : 'D';
                else if($this->awayGoals < $this->homeGoals)    return ($verbose) ? 'Loss' : 'L';
                if($this->awayGoals > $this->homeGoals)         return ($verbose) ? 'Win' : 'W';
                break;
            case 'overview':
            default:
                return $this->getGoals('home').'-'.$this->getGoals('away');
        }

    }

    public function getGoals($homeOrAway='home', $returnGoalsAgainst=false){
        if($homeOrAway === $this->home)         $homeOrAway = 'home';
        else if($homeOrAway === $this->away)    $homeOrAway = 'away';

        //invert based on opposition goals
        if($returnGoalsAgainst === true){
            if($homeOrAway = 'home')        $homeOrAway = 'away';
            else if($homeOrAway = 'away')   $homeOrAway = 'home';
        }

        //todo add in comparison for players
        if($homeOrAway === 'home'){
            return (isset($this->homeGoals)) ? $this->homeGoals : rand(0,5);
        } else {
            return (isset($this->awayGoals)) ? $this->awayGoals : rand(0,5);
        }
    }
}
