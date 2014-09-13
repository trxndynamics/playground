<?php

class LeagueController extends BaseController {

    public function table(){
        return View::make('display/pages/league/table');
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
