<?php

class PlayerController extends BaseController {

    public function stats(){
        return View::make('display/pages/player/stats');
    }

}
