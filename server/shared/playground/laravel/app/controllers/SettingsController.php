<?php

class SettingsController extends BaseController {

    public function fixtureGenerate(){
        Artisan::call('FixtureGenerate');

        return Redirect::to('/user/settings');
    }
}
