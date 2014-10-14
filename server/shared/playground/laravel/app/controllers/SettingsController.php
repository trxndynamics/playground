<?php

class SettingsController extends BaseController {

    public function fixtureGenerate(){
        Artisan::call('FixtureGenerate');

        return Redirect::to('/user/settings');
    }

    public function resultsGenerate(){
        $matches = Match::where('dateTimestamp','<',time())->get();

        /** @var $match Match */
        foreach($matches as $match){
            $match->generateResult();
        }

        return Redirect::to('/user/settings');
    }

    public function playerFix(){
        $players = Player::all();

        foreach($players as $player){
            $player->fitness = (isset($player->fitness)) ? $player->fitness : rand(95,100);     //set the base fitness levels if they dont already exist

            $player->save();
        }

        return Redirect::to('/user/settings');
    }
}
