<?php

class PlayerController extends BaseController {

    public function search(){
        return View::make('display/pages/player/search');
    }

    public function stats(){
        return View::make('display/pages/player/stats');
    }

}
