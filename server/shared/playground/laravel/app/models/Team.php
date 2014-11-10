<?php

class Team extends Moloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teams';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();

    public $bench;
    public $squad;

    /**
     * returns the current status of the team
     *
     * @return mixed
     */
    public function getStatus(){
        $statuses = array(
            ' post year end financial forecast',
            ' look to add to squad',
            ' aiming for financial fair play'
        );
        return $statuses[array_rand($statuses)];
    }

    protected $required       = ['GK','LB','CB','CB','RB','LM','CDM','RM','CAM','ST','ST'];
    protected $benchRequired  = ['GK', 'LB', 'RB', 'CB', 'CM', 'ST', 'LM'];
    protected $aliases        = ['RWB'=>'RB', 'LWB'=>'LB','RW'=>'RM','LW'=>'LM','LF'=>'LM','RF'=>'RM','CF'=>'ST'];

    /**
     * Generate a squad
     *
     * @return array
     */
    public function generateSquad(){
        $squad      = [];
        $bench      = [];
        $players    = Player::where('misc.club','=',$this->name)->get();
        $squadIds   = [];
        $benchIds   = [];

        foreach($players as $id=>$player){
            foreach($this->required as $k=>$v){
                if(array_key_exists($player->misc['name'], $squad)) continue;
                $playerPosition = $player->misc['position'];
                if(array_key_exists($player->misc['position'], $this->aliases))   $playerPosition = $this->aliases[$player->misc['position']];

                if($playerPosition === $v){
                    unset($this->required[$k]);
                    $squadIds[] = $player->id;
                    $squad[$player->misc['name']] = $player;
                }
            }
        }

        if(!empty($required)){
            foreach($players as $id=>$player){
                //todo have this use positional typing for CB, MF, ST covering roles instead of just adding next available
                if(!array_key_exists($player->misc['name'], $squad)){
                    array_shift($required);
                    $squad[$player->misc['name']] = $player;
                    $squadIds[] = $player->id;

                    if(empty($required))    break;
                }
            }
        }

        foreach($players as $player){
            if(!array_key_exists($player->misc['name'], $squad) &&
                (!array_key_exists($player->misc['name'], $squad) &&
                    count($bench) < 7))
            {
                $benchIds[] = $player->id;
                $bench[$player->misc['name']] = $player;
            }
        }

        $this->teamSelection = [
            'squad' => $squadIds,
            'bench' => $benchIds
        ];

        $this->save();

        $this->squad = $squad;
        $this->bench = $bench;

        return [
            'squad' => $squad,
            'bench' => $bench
        ];
    }

    public function filterTeamByPosition($teamRole=null,$teamPosition=null){
        if(!in_array($teamRole, ['squad','bench','reserves']))  $teamRole = 'squad';

        return array_filter($this->$teamRole, function($item) use ($teamPosition){
            /** @var Player $item */
            return ($item->getPosition(true) == $teamPosition);
        });
    }

    public function getForm($quantity=5){
        if(!is_int($quantity))  $quantity = 5;

        $matches = Match::where('dateTimestamp','<',time())
            ->whereIn('teams',[$this->name])
            ->orderBy('dateTimestamp', 'desc')
            ->take($quantity)
            ->get();

        $form = [];

        /**
         * @var $match Match
         */
        foreach($matches as $match){
            $form[] = $match->getResult($this->name, false);
        }

        //as the search is done in reverse order (descending from current date, we need to reverse the order returned)
        return array_reverse($form);
    }

    /**
     * returns the finances as recorded per month for the last twelve months
     * @return array
     */
    public function getFinances(){
        return [
            "August"    => 1,
            "September" => 2,
            "October"   => 5,
            "November"  => 8,
            "December"  => 13,
            "January"   => 10,
            "February"  => 6,
            "March"     => 7,
            "April"     => 4,
            "May"       => 6,
            "June"      => 8,
            "July"      => 8
        ];
    }
}
