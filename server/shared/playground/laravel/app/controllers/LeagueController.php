<?php

class LeagueController extends BaseController {

    public function table($name){
        $league = League::where('name','=',$name)->first();

        return View::make('display/pages/league/table')->with('league',$league);
    }

    public function calendar(){
        $user       = Sentry::getUser();
        $matches    = Match::where('userId','=',$user->id)
            ->where('dateTimestamp','>',time())
            ->orderBy('dateTimestamp')
            ->get();

        return View::make('display/pages/league/calendar')
            ->with('matches',$matches)
            ->with('user',$user)
        ;
    }
}
