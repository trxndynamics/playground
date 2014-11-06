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

    public function assistsGenerate(){
        $matches = Match::where('dateTimestamp','<',time())->get();

        /** @var Match $match */
        foreach($matches as $match){
            $match->generateAssists('home');
            $match->generateAssists('away');
            $match->save();
        }

        return Redirect::to('/user/settings');
    }

    public function motmGenerate(){
        $matches = Match::where('dateTimestamp','<',time())->get();

        foreach($matches as $match){
            $teamName   = ($match->awayGoals > $match->homeGoals) ? $match->home : $match->away;

            $players    = Player::where('misc.club',$teamName)->get();
            $playerList = [];

            foreach($players as $player){
                $playerList[] = $player->misc['name'];
            }

            $match->motm = $playerList[array_rand($playerList)];
            $match->save();
        }

        return Redirect::to('/user/settings');
    }

    public function goalsGenerate(){
        $matches = Match::where('dateTimestamp','<',time())->get();

        /** @var Match $match */
        foreach($matches as $match){
            $match->generateScorers('home');
            $match->generateScorers('away');
            $match->save();
        }

        return Redirect::to('/user/settings');
    }

    public function playerFix(){
        $players = Player::all();

        foreach($players as $player){
            if(!isset($this->contractExpiry)){
                $expiryDate = \Carbon\Carbon::create()->addYears(rand(2,5));
                $player->contractExpiry = $expiryDate->timestamp;                                       //set the players contact expiry date
            }

            $player->morale         = (isset($player->morale)) ? $player->morale : rand(0,5);           //set the base morale level
            $player->fitness        = (isset($player->fitness)) ? $player->fitness : rand(95,100);      //set the base fitness levels if they dont already exist
            $player->save();
        }

        return Redirect::to('/user/settings');
    }

    public function reviewPlayerCompete(){
        $players = Player::take(5)->get();

        /** @var Player $playerA */
        $playerA = $players->first();

        /** @var Player $playerB */
        $playerB = $players->last();

        $competeResult = $playerA->competeWithPlayer($playerB, 'Defender', array('home'=>'Real Madrid'));

        return $playerA->misc['name'] . (($competeResult == true) ? ' beat ' : ' lost to ') . $playerB->misc['name'];
    }
}
