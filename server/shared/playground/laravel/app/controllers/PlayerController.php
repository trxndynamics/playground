<?php

class PlayerController extends BaseController {

    public function search(){
        $players = Player::project(array(
            '_id',
            'misc.age',
            'misc.club',
            'misc.league',
            'misc.name',
            'misc.nation',
            'misc.position',
            'playerCard.attributes'
        ))->get();

        return View::make('display/pages/player/search')
            ->with('players', $players);
    }

    public function stats($id){
        $player = Player::find($id);

        return View::make('display/pages/player/stats')->with('player',$player);
    }

}
