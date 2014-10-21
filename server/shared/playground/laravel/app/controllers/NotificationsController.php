<?php

class NotificationsController extends BaseController {

    public function news(){
        $user           = Sentry::getUser();
        $numberOfTeams  = Team::count();
        $team           = Team::where('name','!=',$user->club)->skip(rand(1,$numberOfTeams-3))->first();
        $player         = Player::where('misc.club','=',$team->name)->first();
        $teamTwo        = Team::where('name','!=',$team->name)->skip(rand(1,$numberOfTeams-3))->first();
        $teamThree      = Team::where('name','!=',$user->club)->skip(rand(1,$numberOfTeams-3))->first();

        return View::make('display/pages/media/news')
            ->with('user', Sentry::getUser())
            ->with('player', $player)
            ->with('team', $team)
            ->with('teamTwo',$teamTwo)
            ->with('teamThree', $teamThree)
        ;
    }
}
