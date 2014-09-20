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
        //get the start date and end date of football league calendar
        $startDate  = strtotime('second sat of august '.date('Y'));    //start date
        $endDate    = strtotime('first sat of may '.date('Y'));        //end date

        //get the number of teams for a particular league
        $leagueName = 'Bundesliga';

        $league = League::where('name','=',$leagueName)->first();
        $teams  = Team::where('league','=',$leagueName)->get();

        //count the number of teams
        $numberOfTeams = count($teams);

        foreach($teams as $team){
            var_dump($team->name);
        }
	}

}
