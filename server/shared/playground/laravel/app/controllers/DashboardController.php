<?php

class DashboardController extends BaseController {

    public function index(){
        return View::make('display/dashboard');
    }

    public function start(){
        $user = Sentry::getUser();
        if(isset($user->club))  return Redirect::to('/dashboard/tiles');

        $aims       = ['League and Cup Success', 'League Success', 'Cup Success', 'Survival', 'Financial Security'];
        $leagues    = ['Bundesliga'];

        if(Request::isMethod('post')){

            $user->aim      = Input::get('aim');
            $user->club     = Input::get('club');
            $user->forename = Input::get('forename');
            $user->gender   = Input::get('gender');
            $user->league   = Input::get('league');
            $user->surname  = Input::get('surname');

            if(
                in_array($user->league, $leagues) &&
                in_array($user->aim, $aims)
            ){
                $user->save();
            }

            return Redirect::to('/dashboard/tiles');
        }

        return View::make('display/pages/start')
            ->with('aims', $aims)
            ->with('leagues', $leagues)
            ->with('hideNav', true)
            ->with('teams', Team::where('league','Bundesliga')->orderBy('name','ASC')->lists('name'))
            ->with('leagues', Team::groupBy('league')->orderBy('league','ASC')->lists('league'))
        ;
    }

    public function tiles(){
        $user = Sentry::getUser();
        if(!isset($user->club)) return Redirect::to('/start');

        $nextMatch = Match::where('userId','=',$user->id)
            ->where('dateTimestamp','>',time())
            ->orderBy('date')
            ->first();

        return View::make('display/pages/tiles')
            ->with('nextMatch', $nextMatch)
        ;
    }
}
