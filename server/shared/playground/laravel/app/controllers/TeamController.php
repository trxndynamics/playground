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

    public function selectKit($location=null){

        if($location === null){
            return View::make('display/pages/team/select-kit');
        }

        if(Request::isMethod('post')){
            $user = Sentry::getUser();
            $user->away_kit = $user->home_kit;
            $user->home_kit = $_POST['src'];
            $user->save();
        }

        return 'true';
    }
}