<?php

class NotificationsController extends BaseController {

    public function players(){
        $notifications = [
            [
                'id'        => 241,
                'header'    => 'Contract',
                'text'      => 'I would like a new contract',
                'name'      => 'Ryan Giggs',
            ],
            [
                'id'        => 27,
                'header'    => 'Contract',
                'text'      =>'I would like a new contract',
                'name'      => 'Ryan Giggs',
            ],
            [
                'id'        => 2,
                'header'    => 'Contract',
                'text'      => 'First Team Action',
                'name'      => 'Ryan Giggs',
            ],
        ];

        return View::make('display/pages/notifications-carousel')
            ->with('notifications', $notifications
        );
    }

}
