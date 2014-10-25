<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FixtureGenerate extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'FixtureGenerate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a list of fixtures for a particular league';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $startDateTimestamp = strtotime('second sat of august '.date('Y'));

        $leagueName = 'Bundesliga';
        $teamList   = Team::where('league','=',$leagueName)->get();
        $arrTeams   = [];

        foreach($teamList as $teamListItem){
            $arrTeams[] = $teamListItem->name;
        }

        //get the start date and end date of football league calendar
        $games = array();
        $teams = count($arrTeams);

        // do the work
        for( $i=1; $i<=$teams; $i++ ) {
            $games[$i] = array();
            for( $j=1; $j<=$teams; $j++ ) {
                $games[$i][$j] = $this->getWeek($i, $j, $teams);
            }
        }

        for($i=1; $i<=count($games); $i++){
            for($j=1; $j<=count($games); $j++){
                if($i==$j) continue;

                //todo sort the fixture date out so that there is not a massive set of consecutive home / away fixtures
                $matchWeek = $this->getWeek($i, $j, $teams);
                $fixtureDate = \Carbon\Carbon::createFromTimestamp($startDateTimestamp)->addWeeks($matchWeek);

                $fixture                = new Match();
                $fixture->home          = $arrTeams[$i-1];
                $fixture->away          = $arrTeams[$j-1];
                $fixture->userId        = '53fd0feb10f0ed20048b4567';  //todo ensure this is the specific user
                $fixture->dateTimestamp = $fixtureDate->timestamp;
                $fixture->date          = $fixtureDate;
                $fixture->teams         = [$arrTeams[$i-1], $arrTeams[$j-1]];
                $fixture->league        = $leagueName;
                $fixture->matchDay      = $matchWeek;
                $fixture->type          = 'league';

                $storedMatch = Match::where('league','=','Bundesliga')
                    ->where('home','=',$fixture->home)
                    ->where('away','=',$fixture->away)
                    ->first()
                ;

                if($storedMatch === null){
                    $fixture->save();
                }
            }
        }
    }

    function getWeek($home, $away, $num_teams) {
        if($home == $away){
            return -1;
        }
        $week = $home+$away-2;
        if($week >= $num_teams){
            $week = $week-$num_teams+1;
        }
        if($home>$away){
            $week += $num_teams-1;
        }

        return $week;
    }
}
