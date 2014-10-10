<?php

class SettingsController extends BaseController {

    public function fixtureGenerate(){
        Artisan::call('FixtureGenerate');

        return Redirect::to('/user/settings');
    }

    public function resultsGenerate(){
        $matches = Match::where('dateTimestamp','<',time())->get();

        foreach($matches as $match){
            $match->generateResult();
        }

        return Redirect::to('/user/settings');
    }
}
