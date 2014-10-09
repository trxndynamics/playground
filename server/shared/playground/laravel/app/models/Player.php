<?php

class Player extends Moloquent {
    /**
     * The available player roles
     *
     * @var array
     */
    protected $playerRoles = [
        'Goalkeeper'    => ['GK'],
        'Defender'      => ['LB','LWB','RB','RWB','CB'],
        'Midfielder'    => ['LM','LF','LW','RM','RF','RW','CDM','CM','CAM'],
        'Forward'       => ['ST','CF']
    ];

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

    /**
     * returns the flag to determine if the contract is expiring
     *
     * @param $contract
     * @return bool
     */
    private function isContractExpiring(){
        return ($this->getContractExpiry() < \Carbon\Carbon::create()->addMonths(18));
    }

    private function isHappy(){
        return ($this->getMorale() > 3);
    }

    /**
     * returns the image reference used for the player's facial image
     *
     * @return null|string
     */
    public function getImageFace(){
        return isset($this->playerCard['picture']) ? app_images_faces_path(false).$this->playerCard['picture'] : null;
    }

    /**
     * returns the image reference used for the player's nationality
     *
     * @return null|string
     */
    public function getImageNation(){
        return isset($this->playerCard['nation']) ? app_images_nation_path(false).$this->playerCard['nation'] : null;
    }

    /**
     * returns the image reference used for the player's associated club
     *
     * @return null|string
     */
    public function getImageClub(){
        return isset($this->playerCard['club']) ? app_images_club_crest_path(false).'13/'.str_replace(' ','_',mb_strtolower($this->misc['club'])).'/crest.png' : null;
    }

    /**
     * returns the condition of the player as a percentage
     *
     * @return int
     */
    public function getFitness(){
        return rand(0,100);
    }

    /**
     * returns the players in-form status
     *
     * @return int
     */
    public function getForm(){
        return rand(0,5);
    }

    /**
     * returns the players value
     *
     * @return string
     */
    public function getValue(){
        $x = rand(0, 10000000);
        if ($x > 1000000) {
            $divisor = 1000000;
        } elseif ($x > 10000) {
            $divisor = 10000;
        } else {
            $divisor = 1;
        }
        $x = $x - ($x % $divisor);
        return number_format($x);
    }

    /**
     * returns the number of appearances the player has scored
     *
     * @return int
     */
    public function getAppearances(){
        return rand(0,10);
    }

    /**
     * returns the number of assists the player has scored
     *
     * @return int
     */
    public function getAssists(){
        return rand(0,10);
    }

    /**
     * returns the number of goals the player has scored
     *
     * @return int
     */
    public function getGoals(){
        return rand(0,10);
    }

    /**
     * returns the players position (e.g. defence, midfield, attack, goalkeeper)
     */
    public function getPosition($general=false){
        if($general === false)   return $this->playerCard['position'];

        foreach($this->playerRoles as $positionName => $positions){
            if(in_array($this->playerCard['position'], $positions))   return $positionName;
        }

        return $this->playerCard['position'];
    }

    /**
     * returns the current carbon instance of the contract expiry
     *
     * @return static
     */
    public function getContractExpiry(){
        return \Carbon\Carbon::create()->addYears(rand(0,5));
    }

    /**
     * Gets the players morale status
     * @return int
     */
    public function getMorale(){
        return rand(0,5);
    }

    /**
     * returns the players current quoted status
     *
     * @return string
     */
    public function getQuote($status=null){
        $shortQuote = 'content with how things are going';
        $longQuote  = 'I\'m happy to remain in contention for upcoming games and would like to be considered for future matches';

        $isExpiring = $this->isContractExpiring();
        $isHappy    = $this->isHappy();

        if($isHappy && $isExpiring){
            $shortQuote = 'wants a new contract';
            $longQuote  = 'I would like a new contract as I feel like my contract is nearing its end';

        } else if(!$isHappy && $isExpiring){
            $shortQuote = 'considering other options';
            $longQuote  = 'I don\'t feel like things are working out and am currently considering other options';

        } else if(!$isHappy && !$isExpiring){
            $shortQuote = 'struggling to settle';
            $longQuote  = 'I\'m currently struggling to settle into the team and the area at the moment';

        }

        switch($status){
            case 'both':
                return ['short'=>$shortQuote, 'long'=>$longQuote];
            case 'short':
                return $shortQuote;
            case 'long':
            default:
                return $longQuote;
        }
    }

    public function getTotalStats(){
        if(!isset($this->attributes['total stats']))    return 0;

        return $this->attributes['total stats'];
    }

    /**
     * Compete with Player
     *
     * @param $player Player
     * @return bool
     */
    public function competeWithPlayer($player, $position, $flags){
        //todo use position and addition flags (such as condition, home team, etc. to decide whether the competition is won or lost)
        if($this->getTotalStats() > $player->getTotalStats())   return true;
        else                                                    return false;
    }
}