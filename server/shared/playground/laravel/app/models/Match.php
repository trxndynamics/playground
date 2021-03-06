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

    public function generateScorers($homeOrAway='home'){
        if(!in_array($homeOrAway, ['home','away'])) return null;

        if($this->getGoals($homeOrAway) > 0){
            $team       = $this->getTeam($homeOrAway);
            $players    = Player::where('misc.club',$team->name)->get();
            $playerList = [];

            /** @var Player $player */
            foreach($players as $player){
                if($player->misc['position'] == 'GK')   continue;

                $playerList[] = $player->misc['name'];
            }

            if($homeOrAway == 'home'){
                $homeScorers = [];
                for($i=0; $i<$this->getGoals($homeOrAway); $i++){
                    $homeScorers[] = $playerList[array_rand($playerList)];
                }
                $this->homeScorers = $homeScorers;
            } elseif($homeOrAway == 'away'){
                $awayScorers = [];
                for($i=0; $i<$this->getGoals($homeOrAway); $i++){
                    $awayScorers[] = $playerList[array_rand($playerList)];
                }
                $this->awayScorers = $awayScorers;
            }
        }
    }

    public function generateAssists($homeOrAway='home'){
        if(!in_array($homeOrAway, ['home','away'])) return null;

        if($this->getGoals($homeOrAway) > 0){
            $team       = $this->getTeam($homeOrAway);
            $players    = Player::where('misc.club',$team->name)->get();
            $playerList = [];

            /** @var Player $player */
            foreach($players as $player){
                $playerList[] = $player->misc['name'];
            }

            if($homeOrAway == 'home'){
                $homeAssists = [];
                for($i=0; $i<$this->getGoals($homeOrAway); $i++){
                    $homeAssists[] = $playerList[array_rand($playerList)];
                }
                $this->homeAssists = $homeAssists;
            } elseif($homeOrAway == 'away'){
                $awayAssists = [];
                for($i=0; $i<$this->getGoals($homeOrAway); $i++){
                    $awayAssists[] = $playerList[array_rand($playerList)];
                }
                $this->awayAssists = $awayAssists;
            }
        }
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

    public function getTeam($homeOrAway='home'){
        if($homeOrAway === 'away')  $teamName = $this->away;
        else                        $teamName = $this->home;

        $team = Team::where('name','=',$teamName)->first();

        return $team;
    }

    public function getMatchBall($league=null){
        switch(strtolower($league)){
            case "bundesliga":
                return app_images_matchball_path(false).'mitre/delta-v12.png';
                break;
            case "eredivisie":
                return app_images_matchball_path(false).'derbystar/brilliant-aps-eredivisie.png';
                break;
            default:
                return app_images_matchball_path(false).'mitre/delta-v12.png';
                break;
        }
    }
}