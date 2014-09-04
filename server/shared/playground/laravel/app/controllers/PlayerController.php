<?php

class PlayerController extends BaseController {

    public function search(){
        $players = Player::project(array(
            'misc.age',
            'misc.club',
            'misc.league',
            'misc.name',
            'misc.nation',
            'playerCard.attributes'
        ))->get();

        return View::make('display/pages/player/search')
            ->with('players', $players);
    }

    public function stats(){
        return View::make('display/pages/player/stats');
    }

}
