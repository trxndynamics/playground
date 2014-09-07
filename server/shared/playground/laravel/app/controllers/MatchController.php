<?php

class MatchController extends BaseController {

    public function timeline(){
        return View::make('display/pages/timeline');
    }

    public function selectSquad(){
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
