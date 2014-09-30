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
     * Generate an opposition squad
     *
     * @return array
     */
    public function generateSquad(){
        $oppositionSquad    = [];
        $oppositionBench    = [];
        $players            = Player::where('misc.club','=',$this->name)->get();

        foreach($players as $id=>$player){
            foreach($this->required as $k=>$v){
                if(array_key_exists($player->misc['name'], $oppositionSquad)) continue;
                $playerPosition = $player->misc['position'];
                if(array_key_exists($player->misc['position'], $this->aliases))   $playerPosition = $this->aliases[$player->misc['position']];

                if($playerPosition === $v){
                    unset($this->required[$k]);
                    $oppositionSquad[$player->misc['name']] = $player;
                }
            }
        }

        if(!empty($required)){
            foreach($players as $id=>$player){
                //todo have this use positional typing for CB, MF, ST covering roles instead of just adding next available
                if(!array_key_exists($player->misc['name'], $oppositionSquad)){
                    array_shift($required);
                    $oppositionSquad[$player->misc['name']] = $player;

                    if(empty($required))    break;
                }
            }
        }

        foreach($players as $player){
            if(!array_key_exists($player->misc['name'], $oppositionSquad) &&
                (!array_key_exists($player->misc['name'], $oppositionSquad) &&
                    count($oppositionBench) < 7))
            {
                $oppositionBench[$player->misc['name']] = $player;
            }
        }

        $this->squad = $oppositionSquad;
        $this->bench = $oppositionBench;

        return [
            'squad' => $oppositionSquad,
            'bench' => $oppositionBench
        ];
    }

    public function filterTeamByPosition($teamRole=null,$teamPosition=null){
        if(!in_array($teamRole, ['squad','bench','reserves']))  $teamRole = 'squad';

        return array_filter($this->$teamRole, function($item) use ($teamPosition){
            /** @var Player $item */
            return ($item->getPosition(true) == $teamPosition);
        });
    }
}
