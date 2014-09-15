<?php

class SquadController extends BaseController {

    public function fitness(){
        $projectedFields = array(
            'misc.age',
            'misc.name',
            'misc.nation',
            'misc.position',
            'playerCard',
        );

        $user       = Sentry::getUser();
        $players    = Player::project($projectedFields)->where('misc.club','=',$user->club)->get();

        return View::make('display/pages/squad/fitness')->with('players',$players);
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
