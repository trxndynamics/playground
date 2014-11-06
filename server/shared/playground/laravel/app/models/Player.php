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
    public function isContractExpiring(){
        return ($this->getContractExpiry() < \Carbon\Carbon::createFromTimestamp($this->contactExpiry)->addMonths(18));
    }

    /**
     * returns the players happiness status
     *
     * @return bool
     */
    public function isHappy(){
        return ($this->getMorale() > 3);
    }

    /**
     * returns the flag to say whether or not the contract has expired
     *
     * @return bool
     */
    public function hasContractExpired(){
        return (\Carbon\Carbon::create() > \Carbon\Carbon::createFromTimestamp($this->contactExpiry));
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
        return (isset($this->fitness)) ? $this->fitness : rand(0,100);
    }

    /**
     * returns the players in-form status
     *
     * @return int
     */
    public function getForm($verbose=false){
        $playerFormValues = [
            0 => 'N/A',
            1 => 'Very Poor',
            2 => 'Poor',
            3 => 'Average',
            4 => 'Good',
            5 => 'Excellent'
        ];

        $playerForm = (isset($this->form)) ? $this->form : rand(1,5);

        return ($verbose === true) ? $playerFormValues[$playerForm] : $playerForm;
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
        $assists    = 0;
        $matches    = Match::where('awayAssists', $this->misc['name'])
            ->orWhere('homeAssists', $this->misc['name'])
            ->get();

        /** @var Match $match */
        foreach($matches as $match){
            $scorers = [];
            if(isset($match->homeAssists))  $scorers[] = $match->homeAssists;
            if(isset($match->awayAssists))  $scorers[] = $match->awayAssists;

            foreach($scorers as $scorerType){
                foreach($scorerType as $scorer){
                    if($this->misc['name'] == $scorer){
                        $assists++;
                    }
                }
            }
        }

        return $assists;
    }

    /**
     * returns the number of goals the player has scored
     *
     * @return int
     */
    public function getGoals(){
        $goals      = 0;
        $matches    = Match::where('awayScorers', $this->misc['name'])
            ->orWhere('homeScorers', $this->misc['name'])
            ->get();

        /** @var Match $match */
        foreach($matches as $match){
            $scorers = [];
            if(isset($match->homeScorers))  $scorers[] = $match->homeScorers;
            if(isset($match->awayScorers))  $scorers[] = $match->awayScorers;

            foreach($scorers as $scorerType){
                foreach($scorerType as $scorer){
                    if($this->misc['name'] == $scorer){
                        $goals++;
                    }
                }
            }
        }

        return $goals;
    }

    /** returns the number of man of the match appearances the player has received */
    public function getMOTMs(){
        $matches = Match::where('motm',$this->misc['name'])->get();

        return count($matches);
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
        return (isset($this->contractExpiry)) ? \Carbon\Carbon::createFromTimestamp($this->contractExpiry) : \Carbon\Carbon::create()->addYears(rand(0,5));
    }

    /**
     * Gets the players morale status
     * @return int
     */
    public function getMorale($verbose=false){
        $moraleStates = [
            0 => 'Depressed',
            1 => 'Unhappy',
            2 => 'Content',
            3 => 'Happy',
            4 => 'Excited',
            5 => 'Ecstatic'
        ];

        $morale = (isset($this->morale)) ? $this->morale : rand(0,5);

        return ($verbose == true) ? $moraleStates[$this->morale] : $morale;
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
        return $this->getPlayerAttribute('total stats');
    }

    /**
     * Compete with Player
     *
     * todo tidy this area up to have the same calculations being run regardless of player, e.g. no opposing player references
     *
     * @param $opposingPlayer Player
     * @return bool
     */
    public function competeWithPlayer($opposingPlayer, $position, $flags){
        return (
            array_sum($this->getCompeteStats($position, $flags)) >
            array_sum($opposingPlayer->getCompeteStats($position, $flags))
        ) ? true : false;
    }

    /**
     * @param $player Player
     * @param $position
     * @param $flags
     * @return array
     */
    private function getCompeteStats($position, $flags){
        //get the players stats
        $playerStats = $this->getSpecificStats($position);

        if(empty($playerStats)) return 0;

        //add in negative effects for being out of position
        if(($this->getPosition(true) != $position) && ($this->getPosition() != $position))    $playerStats[] = -50;

        //add boosted effects for playing at home
        if(isset($flags['home']) && ($this->misc['club'] == $flags['home']))  $playerStats[] = 25;

        //todo add in calculation for player popularity with fans

        //make amendments for player fitness
        $playerStats[] = $this->getFitness();

        //add in the current form
        $playerStats[] = $this->getForm() * 25;

        //add in the players morale
        $playerStats[] = $this->getMorale() * 15;

        //add in the player fighting for a new contract
        if($this->isHappy() && $this->isContractExpiring())     $playerStats[] = 35;

        return $playerStats;
    }

    /**
     * returns the player attribute
     *
     * @param $attributeName
     * @return mixed|null
     */
    public function getPlayerAttribute($attributeName){
        return (isset($this->attributes['attributes'][$attributeName])) ? $this->attributes['attributes'][$attributeName] : null;
    }

    public function getSpecificStats($position){
        $position       = strtolower($position);
        $statsToFetch   = [];
        $stats          = [];

        switch($position){
            case 'defender':
                $statsToFetch = [
                    'ball control',
                    'sliding tackle',
                    'standing tackle',
                    'jumping',
                    'sprint speed',
                    'strength',
                    'aggression',
                    'interceptions'
                ];
                break;
        }

        foreach($statsToFetch as $fetchItem){
            $stats[$fetchItem] = $this->getPlayerAttribute($fetchItem);
        }

        return $stats;
    }
}