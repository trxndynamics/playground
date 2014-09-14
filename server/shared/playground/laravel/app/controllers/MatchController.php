<?php

class MatchController extends BaseController {

    public function create(){
        $user = Sentry::getUser();

        if(Request::isMethod('post')){
            $selectedDate       = \Carbon\Carbon::parse(Input::get('selectedDate'));
            $selectedClub       = Input::get('club');
            $selectedLocation   = strtolower(Input::get('location'));

            $match = new Match();
            $match->date            = $selectedDate;
            $match->dateTimestamp   = $selectedDate->timestamp;
            $match->userId          = $user->id;
            $match->location        = $selectedLocation;

            switch($selectedLocation){
                case "home":
                    $match->home = $user->club;
                    $match->away = $selectedClub;
                    break;
                case "away":
                    $match->home = $selectedClub;
                    $match->away = $user->club;
                    break;
                case "neutral":
                    $match->home = $selectedClub;
                    $match->away = $user->club;
                    break;
            }

            $match->save();

            return Redirect::to('/league/calendar');
        }

        $leagues = League::all();
        return View::make('display/pages/fixture/create')->with('leagues', $leagues);
    }

    public function timeline(){
        $user               = Sentry::getUser();
        $userSquad          = Player::whereIn('_id',$user->currentSquad)->get();
        $match              = Match::where('userId','=',$user->id)
            ->where('dateTimestamp','>',time())
            ->orderBy('dateTimestamp')
            ->first();
        $team               = Team::where('name','=',($match->home == $user->club) ? $match->away : $match->home)->first();
        $players            = Player::where('misc.club','=',$team->name)->get();

        $required           = ['GK','LB','CB','CB','RB','LM','CDM','RM','CAM','ST','ST'];
        $benchRequired      = ['GK', 'LB', 'RB', 'CB', 'CM', 'ST', 'LM'];
        $aliases            = ['RWB'=>'RB', 'LWB'=>'LB','RW'=>'RM','LW'=>'LM','LF'=>'LM','RF'=>'RM','CF'=>'ST'];
        $oppositionSquad    = [];
        $oppositionBench    = [];

        foreach($players as $id=>$player){
            foreach($required as $k=>$v){
                if(array_key_exists($player->misc['name'], $oppositionSquad)) continue;
                $playerPosition = $player->misc['position'];
                if(array_key_exists($player->misc['position'], $aliases))   $playerPosition = $aliases[$player->misc['position']];

                if($playerPosition === $v){
                    unset($required[$k]);
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

        return View::make('display/pages/timeline')
            ->with('players', $userSquad)
            ->with('user', $user)
            ->with('match', $match)
            ->with('team',$team)
            ->with('oppositionSquad', $oppositionSquad)
            ->with('oppositionBench', $oppositionBench)
        ;
    }

    public function selectSquad(){
        if(Request::isMethod('post')){
            $user = Sentry::getUser();
            $user->currentSquad = Input::get('player');
            $user->save();
            return Redirect::to('/match/timeline');
        }

        $projectedFields = array(
            'misc.age',
            'misc.name',
            'misc.nation',
            'misc.position',
            'playerCard',
        );

        $user       = Sentry::getUser();
        $players    = Player::project($projectedFields)->where('misc.club','=',$user->club)->get();

        return View::make('display/pages/match/select-squad')->with('players', $players);
    }
}
