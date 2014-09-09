<?php

class MatchController extends BaseController {

    public function create(){
        //todo use the team model instead of the player model to populate this information
        $listOfPlayers = Player::project('misc.club')->get();

        foreach($listOfPlayers as $playerItem){
            $clubList[$playerItem->misc['club']] = $playerItem->misc['club'];
        }

        return View::make('display/pages/fixture/create')->with('teams', array_keys($clubList));
    }

    public function timeline(){
        $user       = Sentry::getUser();
        $userSquad  = Player::whereIn('_id',$user->currentSquad)->get();

        return View::make('display/pages/timeline')
            ->with('players', $userSquad)
            ->with('user', $user)
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
