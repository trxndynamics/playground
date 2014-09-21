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
	protected $description = 'Command description.';

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
        $endDateTimestamp   = strtotime('first sat of may '.date('Y'));

        //get the start date and end date of football league calendar
        $startDate  = \Carbon\Carbon::createFromTimestamp($startDateTimestamp);    //start date
        $endDate    = \Carbon\Carbon::createFromTimestamp($endDateTimestamp);        //end date

        //get the number of saturdays between those two periods
        $numberOfSaturdays = intval(floor(($startDate->diffInDaysFiltered(function(\Carbon\Carbon $date){
            return $date->isWeekend();
        }, $endDate))/2));

        //get the number of teams for a particular league
        $leagueName = 'Bundesliga';

        //get the number of weeks
        $league = League::where('name','=',$leagueName)->first();
        $teams  = Team::where('league','=',$leagueName)->get();

        //count the number of teams
        $numberOfTeams  = count($teams);
        $homeFixtures   = [];

        foreach($teams as $team){
            $teamList[$team->id] = $team->name;
        }

        //get the number of fixtures for each team
        $numberOfFixtureWeeksForEachTeam = ($numberOfTeams-1)*2;

        for($i=0; $i < $numberOfFixtureWeeksForEachTeam; $i++){
            $fixtureDate = \Carbon\Carbon::createFromTimestamp($startDateTimestamp);
            $fixtureDate->addWeeks($i);


        }

        var_dump($numberOfTeams / $numberOfSaturdays);

	}

}
