<?php

class PlayerController extends BaseController {

    public function search($league=null){
        $players = Player::project(array(
            '_id',
            'misc.age',
            'misc.club',
            'misc.league',
            'misc.name',
            'misc.nation',
            'misc.position',
            'playerCard'
        ));

        if($league!==null)     $players = $players->where('misc.league',$league);

        $players = $players->orderBy('misc.name')->get();

        return View::make('display/pages/player/search')
            ->with('players', $players);
    }

    public function stats($id){
        $player = Player::find($id);

        return View::make('display/pages/player/stats')->with('player',$player);
    }

}
