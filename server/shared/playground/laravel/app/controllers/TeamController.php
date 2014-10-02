<?php

class TeamController extends BaseController {

    public function stats($name){
        $projectedFields = array(
            'misc.age',
            'misc.name',
            'misc.nation',
            'misc.position',
            'playerCard',
        );

        $team       = Team::where('name','=',$name)->first();
        $players    = Player::project($projectedFields)
            ->where('misc.club','=',$team->name)
            ->orderBy('misc.name')
            ->get();

        return View::make('display/pages/team/stats')
            ->with('players', $players)
            ->with('team', $team)
        ;
    }

    public function display($id){
        return View::make('display/pages/team/stats');
    }

    public function notifications(){
        $user   = Sentry::getUser();
        $players = Player::where('misc.club','=',$user->club)->get();

        return View::make('display/pages/team/notifications')->with('players',$players);
    }

    public function finances(){
        return View::make('display/pages/team/finances');
    }

    public function selectKit(){
        return View::make('display/pages/team/select-kit');
    }
}