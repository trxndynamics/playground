<?php

class SettingsController extends BaseController {

    public function fixtureGenerate(){
//        $this->call('FixtureGenerate');
        //todo get the fixture generate script running from here
        return Redirect::to('/user/settings');
    }
}
