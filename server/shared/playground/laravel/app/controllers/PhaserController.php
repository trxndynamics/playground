<?php

class PhaserController extends BaseController {
    public function test(){
        $viewport = [
            'width'     => 1100,
            'height'    => 600
        ];
        $config = [
            'matchball' => [
                'x'         => ($viewport['width'] / 2) - 15,
                'y'         => ($viewport['height'] / 2) - 15,
                'width'     => 30,
                'height'    => 30
            ],
            'teams' => [
                'home' => ['name'=>'Bayern München'],
                'away' => ['name'=>'Eintracht Frankfurt']
            ]
        ];

        $match = Match::first();

        return View::make('display/pages/test/phaser')
            ->with('match', $match)
            ->with('config', $config)
            ->with('viewport', $viewport)
        ;
    }
}
