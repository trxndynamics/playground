<?php

class DashboardController extends BaseController {

    public function index(){
        return View::make('display/dashboard');
    }

    public function start(){
        return View::make('display/pages/start');
    }
}
