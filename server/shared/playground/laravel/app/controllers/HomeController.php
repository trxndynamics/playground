<?php

class HomeController extends BaseController {

    public function index(){
        return View::make('layouts.login');
    }

    public function dashboard(){
        return View::make('display/dashboard');
    }
}
