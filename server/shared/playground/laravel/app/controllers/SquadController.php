<?php

class SquadController extends BaseController {

    public function fitness(){
        return View::make('display/pages/squad/fitness');
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
