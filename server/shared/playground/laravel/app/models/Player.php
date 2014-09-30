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
}