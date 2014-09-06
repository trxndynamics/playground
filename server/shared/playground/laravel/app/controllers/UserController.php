<?php

class UserController extends BaseController {

    public function profile(){
        $user = Sentry::getUser();
        return View::make('display/pages/user/profile')->with('user',$user);
    }

    public function settings(){
        return View::make('display/pages/user/settings');
    }
}
