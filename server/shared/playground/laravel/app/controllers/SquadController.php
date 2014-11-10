<?php

class SquadController extends BaseController {

    public function fitness(){
        $projectedFields = array(
            'misc.age',
            'misc.name',
            'misc.nation',
            'misc.position',
            'playerCard',
            'fitness'
        );

        $user       = Sentry::getUser();
        $players    = Player::project($projectedFields)->where('misc.club','=',$user->club)->get();
        $injuredList = [];
        $nationalDuty= [];

        foreach($players as $player){
            if(strtolower($player->getStatus()) == 'injured'){              $injuredList[] = $player->misc['name'];}
            elseif(strtolower($player->getStatus()) == 'national duty'){    $nationalDuty[] = $player->misc['name'];}
        }

        return View::make('display/pages/squad/fitness')
            ->with('players',$players)
            ->with('injuredList',$injuredList)
            ->with('nationalDuty',$nationalDuty);
    }

    public function currentSquad(){
        $projectedFields = array(
            'misc.age',
            'misc.name',
            'misc.nation',
            'misc.position',
            'playerCard',
        );

        $user       = Sentry::getUser();
        $players    = Player::project($projectedFields)->where('misc.club','=',$user->club)->get();

        return View::make('display/pages/squad/current')->with('players', $players);
    }
}
