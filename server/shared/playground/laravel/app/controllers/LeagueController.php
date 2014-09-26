<?php

class LeagueController extends BaseController {

    public function table($name=null){
        if($name === null){
            $user = Sentry::getUser();
            $team = Team::where('name','=',$user->club)->first();
            $name = $team->league;
        }
        $league = League::where('name','=',$name)->first();

        return View::make('display/pages/league/table')->with('league',$league);
    }

    public function calendar($team=null){
        $user = Sentry::getUser();
        $team = ($team === null) ? $team = $user->club : $team;
        $team = Team::where('name','=',$team)->first();

        $teamName   = ($team != null) ? $team->name : $user->club;
        $matches    = Match::where('userId','=',$user->id)
            ->where('dateTimestamp','>',time())
            ->where('teams','=',$teamName)
            ->orderBy('dateTimestamp')
            ->get();

        return View::make('display/pages/league/calendar')
            ->with('matches',$matches)
            ->with('user',$user)
            ->with('filterTeam',$teamName)
        ;
    }
}
