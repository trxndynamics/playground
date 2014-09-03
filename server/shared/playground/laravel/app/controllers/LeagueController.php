<?php

class LeagueController extends BaseController {

    public function table(){
        return View::make('display/pages/league/table');
    }

    public function calendar(){
        return View::make('display/pages/league/calendar');
    }
}
