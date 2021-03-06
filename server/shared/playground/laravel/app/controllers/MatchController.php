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
        $opposition         = Team::where('name','=',($match->home != $user->club) ? $match->away : $match->home)->first();

        /** @var $opposition Team */
        $opposition->generateSquad();

        return View::make('display/pages/timeline')
            ->with('players', $userSquad)
            ->with('user', $user)
            ->with('match', $match)
            ->with('team',$team)
            ->with('opposition',$opposition)
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
            'attributes'
        );

        $user       = Sentry::getUser();
        $players    = Player::project($projectedFields)->where('misc.club','=',$user->club)->get();

        return View::make('display/pages/match/select-squad')
            ->with('players', $players)
            ->with('user', $user)
        ;
    }
}
