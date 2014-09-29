<?php

class Team extends Moloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teams';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();

    /**
     * returns the current status of the team
     *
     * @return mixed
     */
    public function getStatus(){
        $statuses = array(
            ' post year end financial forecast',
            ' look to add to squad',
            ' aiming for financial fair play'
        );
        return $statuses[array_rand($statuses)];
    }
}
